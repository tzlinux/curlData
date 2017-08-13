<?php

namespace App\Console\Commands\Spider;

use DiDom\Document;
use App\Models\Construction;

class ConstructionCommand extends Spider 
{
    protected $signature = 'spider:construction 
                            {concurrency=20}';

    protected $description = '[工程建设] 中标结果挖掘';

    protected $base = '/sczw/jyfwpt/005001/005001003/MoreInfo.aspx?CategoryNum=005001003';

    protected $model = Construction::class;
    
    protected $category = '005001003';

    protected function digContent($html) 
    {
        $dom = new Document($html);

        $sheet = $dom->find('#_Sheet1 tr');

        // 只要三个
        $bidders = [];
        for ($i = 10; $i <= 12; $i++) {
            if (isset($sheet[$i]) && count($sheet[$i]->children()) === 5) {
                $bidders[] = [
                    'rank' => trim($sheet[$i]->child(0)->text()), // 名次
                    'company' => trim($sheet[$i]->child(1)->text()), // 公司
                    'quoted_price' => trim($sheet[$i]->child(2)->text()), // 报价
                    'audit_price' => trim($sheet[$i]->child(3)->text()), // 审核后的价格
                    'score' => trim($sheet[$i]->child(4)->text()) // 评分
                ];
            }
        }

        // 有一部分奇葩的数据 会多一个头... 抛弃掉...
  /*      if (isset($sheet[3]) && count($sheet[3]->children()) === 4) {
            $bid = [
                'uuid' => $this->uuid(trim($dom->find('#tblInfo #tdTitle')[0]->text())), // 信息 id 
                // 'category' => $query['CategoryNum'], // 分类 id
                'title' => trim($dom->find('#tblInfo #tdTitle')[0]->text()), // 标题
                'project' => trim($sheet[11]->text()), // 项目标题
                'owner' => trim($sheet[3]->child(1)->text()), // 项目业主
                'owner_contact' => trim($sheet[3]->child(3)->text()), // 项目业主联系电话
                'tenderee' => trim($sheet[4]->child(1)->text()), // 招标人
                'tenderee_contact' => trim($sheet[4]->child(3)->text()), // 招标人联系电话
                'ifb_agency' => trim($sheet[5]->child(1)->text()), // 招标代理机构
                'ifb_agency_contact' => trim($sheet[5]->child(3)->text()), // 招标代理机构联系电话
                'ifb_address' => trim($sheet[6]->child(1)->text()), // 开标地点
                'ifb_date' => trim($sheet[6]->child(3)->text()), // 开标时间
                'bulletin_date' => trim($sheet[7]->child(1)->text()), // 公示期
                'high_limit_price' => trim($sheet[7]->child(3)->text()), // 投标最高限价
                'bidders' => $bidders // 中标信息
            ];

           // \Log::info('Data:', $bid);

            return $bid;
        }*/


//             if (isset($sheet[3]) && count($sheet[3]->children()) === 4) {
//                  $bid = [
//                      'uuid'               =>  $this->uuid(trim($dom->find('#tblInfo #tdTitle')[0]->text())),// 信息 id
////                      // 'category' => $query['CategoryNum'], // 分类 id
//                      'title'              =>  trim($dom->find('#tblInfo #tdTitle')[0]->text()), // 标题
//                      'project'            => isset($sheet[11]) ? trim($sheet[11]->text()) : null, // 项目标题
//                      'owner'              => (isset($sheet[3]) && $sheet[3]->child(1)) ? trim($sheet[3]->child(1)->text()) : null, // 项目业主
//                      'owner_contact'      => (isset($sheet[3]) && $sheet[3]->child(3)) ? trim($sheet[3]->child(3)->text()) : trim($sheet[4]->child(3)->text()), // 项目业主联系电话
//                      'tenderee'           => (isset($sheet[4]) && $sheet[4]->child(1)) ? trim($sheet[4]->child(1)->text()) : trim($sheet[5]->child(1)->text()),// 招标人
//                      'tenderee_contact'   => (isset($sheet[4]) && $sheet[4]->child(3)) ? trim($sheet[4]->child(3)->text()) : trim($sheet[5]->child(3)->text()), // 招标人联系电话
//                      'ifb_agency'         => (isset($sheet[5]) && $sheet[5]->child(1)) ? trim($sheet[5]->child(1)->text()) : trim($sheet[6]->child(1)->text()), // 招标代理机构
//                      'ifb_agency_contact' => (isset($sheet[5]) && $sheet[5]->child(3)) ? trim($sheet[5]->child(3)->text()) : trim($sheet[6]->child(3)->text()), // 招标代理机构联系电话
//                      'ifb_address'        => (isset($sheet[6]) && $sheet[6]->child(1)) ? trim($sheet[6]->child(1)->text()) : trim($sheet[7]->child(1)->text()), // 开标地点
//                      'ifb_date'           => (isset($sheet[6]) && $sheet[6]->child(3)) ? trim($sheet[6]->child(3)->text()) : trim($sheet[7]->child(3)->text()), // 开标时间
//                      'bulletin_date'      => (isset($sheet[7]) && $sheet[7]->child(1)) ? trim($sheet[7]->child(1)->text()) : trim($sheet[7]->child(1)->text()), // 公示期
//                      'high_limit_price'   => (isset($sheet[7]) && $sheet[3]->child(3)) ? trim($sheet[7]->child(3)->text()) : trim($sheet[7]->child(3)->text()), // 投标最高限价
//                      'bidders' => $bidders // 中标信息
//                  ];
//
//                 // \Log::info('Data:', $bid);
//
//                  return $bid;
//              }



          $bid = [
                            'uuid'               =>  $this->uuid(trim($dom->find('#tblInfo #tdTitle')[0]->text())),// 信息 id
//                      // 'category' => $query['CategoryNum'], // 分类 id
              'title'              =>  trim($dom->find('#tblInfo #tdTitle')[0]->text()), // 标题
              'project'            => isset($sheet[11]) ? trim($sheet[11]->text()) : null, // 项目标题
              'owner'              => (isset($sheet[3]) && $sheet[3]->child(1)) ? trim($sheet[3]->child(1)->text()) : null, // 项目业主
              'owner_contact'      => (isset($sheet[3]) && $sheet[3]->child(3)) ? trim($sheet[3]->child(3)->text()) : null, // 项目业主联系电话
              'tenderee'           => (isset($sheet[4]) && $sheet[4]->child(1)) ? trim($sheet[4]->child(1)->text()) : null,// 招标人
              'tenderee_contact'   => (isset($sheet[4]) && $sheet[4]->child(3)) ? trim($sheet[4]->child(3)->text()) : null, // 招标人联系电话
              'ifb_agency'         => (isset($sheet[5]) && $sheet[5]->child(1)) ? trim($sheet[5]->child(1)->text()) : null, // 招标代理机构
              'ifb_agency_contact' => (isset($sheet[5]) && $sheet[5]->child(3)) ? trim($sheet[5]->child(3)->text()) : null, // 招标代理机构联系电话
              'ifb_address'        => (isset($sheet[6]) && $sheet[6]->child(1)) ? trim($sheet[6]->child(1)->text()) : null, // 开标地点
              'ifb_date'           => (isset($sheet[6]) && $sheet[6]->child(3)) ? trim($sheet[6]->child(3)->text()) : null, // 开标时间
              'bulletin_date'      => (isset($sheet[7]) && $sheet[7]->child(1)) ? trim($sheet[7]->child(1)->text()) : null, // 公示期
              'high_limit_price'   => (isset($sheet[7]) && $sheet[3]->child(3)) ? trim($sheet[7]->child(3)->text()) : null, // 投标最高限价
              'bidders' => $bidders // 中标信息
          ];

         // \Log::info('Data:', $bid);

          return $bid;

    } 
}
