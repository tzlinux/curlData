<?php

namespace App\Console\Commands\Spider;

use DiDom\Document;
use App\Models\Railway;

class RailwayCommand extends Spider 
{
    protected $signature = 'spider:railway 
                            {concurrency=20}';

    protected $description = '[铁路工程] 中标结果挖掘';

    protected $base = '/sczw/jyfwpt/005003/005003003/MoreInfo.aspx?CategoryNum=005003003';

    protected $model = Railway::class;
    
    protected $category = '005003003';

    protected function digContent($html) 
    {
        $dom = new Document($html);

        // 解析部分
        $content = $dom->find('#ivs_content p.ParagraphIndent');
        $table = $dom->find('#ivs_content table tr');

        $bidders = [];
        for ($i = 1; $i <= 3; $i++) {
            if (isset($table[$i]) && count($table[$i]->children()) >=3) {
                $bidders[] = [
                    'category' => $this->category,
                    'rank' => trim($table[$i]->child(0)->text()),
                    'company' => trim($table[$i]->child(1)->text()),
                    'price' => trim($table[$i]->child(2)->text())
                ];
            }
        }

        $bid = [
                'uuid' => $this->uuid(trim($dom->find('#tdTitle b')[0]->text())),
                'title' => trim($dom->find('#tdTitle b')[0]->text()),
                'tenderee' => (isset($content[2]) && $content[2]->child(0)) ? trim($content[2]->child(0)->text()) : null,
                'tenderee_address' => (isset($content[7]) && $content[7]->child(1)) ? trim($content[7]->child(1)->text()) : null,
                'contact' => (isset($content[8]) && $content[8]->child(1)) ? trim($content[8]->child(1)->text()) : null,
                'telephone' =>  (isset($content[9]) && $content[9]->child(1)) ? trim($content[9]->child(1)->text()) : null,
                'project' => (isset($content[2]) && $content[2]->child(2)) ? trim($content[2]->child(2)->text()) : null,
                'bulletin_date' => (isset($content[5]) && $content[5]->child(1)) ? trim($content[5]->child(1)->text()) . ' - ' . trim($content[5]->child(3)->text()) : null,
                'bidders' => $bidders
            ];

       // \Log::info('Data:', $bid);

        return $bid;
    }
}
