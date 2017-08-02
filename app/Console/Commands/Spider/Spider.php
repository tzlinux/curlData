<?php

namespace App\Console\Commands\Spider;

use App\Models\Bidder;
use Exception;
use DiDom\Document;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

abstract class Spider extends Command 
{
    const SPPREC_URI = 'http://www.spprec.com';

    protected $http;

    protected $dom;

    protected $bar;

    protected $base;

    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->http = new Client([
                'base_uri' => self::SPPREC_URI,
                // 'timeout'  => 5
            ]);

        $this->dom = new Document;
    }

    public function handle() 
    {
        $this->spider();
    }

    protected function uuid($factor) 
    {
        return md5($factor);
    }

    protected function model() 
    {
        return new $this->model;
    }

    protected function has($uuid) 
    {
        return $this->model()->where('uuid', $uuid)->first();
    }

    protected function spider() 
    {
        // 先获取第一页的数据
        $html = (string) $this->http->get($this->base)->getBody();
        $this->dom->loadHtml($html);

        // 总页数
        $total = $this->dom->find('#MoreInfoList1_Pager table td font')[1]->text();
        $this->bar = $this->output->createProgressBar($total);

        if ($total < 1) {
            throw new NullContentException($this->base . ' 页数少于 1 请检查链接是否已经更换');
        } else {

            // 先解析一波第一页的
            $this->parseContent();

            $this->bar->advance();

            if ($total > 1) {
                // 第一页就不用重新获取了... 直接从第二页开始
                for ($i = 2; $i <= $total;$i++) {
                    $html = (string) $this->http->post($this->base, [
                            'form_params' => [
                                '__VIEWSTATE' => $this->dom->find('#__VIEWSTATE')[0]->getAttribute('value'),
                                '__VIEWSTATEGENERATOR' => $this->dom->find('#__VIEWSTATEGENERATOR')[0]->getAttribute('value'),
                                '__EVENTTARGET' => 'MoreInfoList1$Pager',
                                '__EVENTARGUMENT' => $i
                            ]
                        ])
                        ->getBody();
                    
                    $this->dom->loadHtml($html);

                    $this->parseContent();

                    $this->bar->advance();
                }
            }
        }

        $this->bar->finish();
    }

    /*
     * 数据录入...
     * */
    protected function parseContent() 
    {
        $requests = function () {
            foreach ($this->parseUrl() as $a) {
                yield function () use ($a) {
                    return $this->http->getAsync($a);
                };
            }
        };

        $pool = new Pool($this->http, $requests(), [
            'concurrency' => (int) $this->argument('concurrency'),
            'fulfilled' => function ($response, $index) {
                $html = (string) $response->getBody();
                $content = $this->digContent($html);

                // 每天连续挖掘会有重复的 按道理来说如果已经存在就应该直接跳出去了 但是呢 Guzzle 会随机返回... 所以暂时先每次都查询一波
                if (! is_null($content['uuid']) && ! $this->has($content['uuid'])) {
                    try {
                        $c = $this->model()->create($content);
                        
                        $bidder = new Bidder();
                        /*分开录入*/
                        foreach($content['bidders'] as $k=>$v)
                        {
                            $data_arr['r_id']    = $content['uuid'];
                            $data_arr['rank']    = $v['rank'];
                            $data_arr['company'] = $v['company'];
                            $data_arr['price']   = $v['price'];
                            $bidder->create($data_arr);
                        }

                    } catch (Exception $e) {
//                        throw new Exception($e->getMessage());
                        \Log::error('Sql Failure: '. $e->getMessage());
                    }
                }
            },
            'rejected' => function ($reason, $index) {
                \Log::error('Request Failure: '. $reason);
            }
        ]);

        $promise = $pool->promise();
        $promise->wait();
    }
    
    protected function parseUrl()   
    {
        $contents = $this->dom->find('#MoreInfoList1_tdcontent td a');
        $a = [];
        foreach ($contents as $content) {
            $a[] = $content->getAttribute('href');
        }

        return $a;
    }

    abstract protected function digContent($html);
}
