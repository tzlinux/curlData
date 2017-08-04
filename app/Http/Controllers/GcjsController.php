<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\Construction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as RequestandResponse;

Class GcjsController extends Controller
{
    public $address = [
            '028'  => '成都',
            '0813' => '自贡',
            '0812' => '攀枝花',
            '0830' => '泸州市',
            '0838' => '德阳市',
            '0816' => '绵阳市',
            '0839' => '广元市',
            '0825' => '遂宁市',
            '0832' => '内江市',
            '0833' => '乐山市',
            '0817' => '南充市',
//            '028'  => '眉山市',
            '0831' => '宜宾市',
            '0826' => '广安市',
            '0818' => '达州市',
            '0835' => '雅安市',
            '0827' => '巴中市',
//            '028'  => '资阳市',
            '0837' => '阿坝藏族羌族自治州',
            '0836' => '甘孜藏族自治州',
            '0834' => '凉山彝族自治州'
        ];

    public function index(RequestandResponse $request)
    {

        $input = $input=Request::all();
        $title = isset($input['title']) ? $input['title'] : '';
        $price = isset($input['price']) ? $input['price'] : '';
        $acode = isset($input['acode']) ? $input['acode'] : '';

        $res = DB::table('constructions');

        if((!empty($input['title'])) || (!empty($input['price'])) || (!empty($input['acode']))) {

            $value = $request->session()->get('user_name');
            if(empty($value))
            {
                return view('yanz');
                die;
            }

            //按地区查
            if(!empty($input['acode']))
            {
                $res = DB::table('constructions')->where('acode','=',$input['acode']);
                $condition2 = '四';
                $result = $res->get()->toArray();

                //匹配数据，如果是四川省公共资源的就按区号查，否则就用开标地点查
                foreach($result as $key => $value)
                {
                    if(strpos($value->ifb_address,$condition2))
                    {
                        $res->where('acode', '=',$input['acode']);
                    }else{
                        $res->where('ifb_address', 'like', '%'.$input['title'].'%');
                    }
                }
            }

            //按招标项目title查询
            if(!empty($input['title']))
            {
                $res->where('title', 'like', '%'.$input['title'].'%');
            }

            //按价格查询
            if(!empty($input['price']))
            {
                $where = [
                    0 =>['5000000'],
                    1 =>['5000000','10000000'],
                    2 =>['10000000','50000000'],
                    3 =>['5000000'],
                ];

                switch($input['price']) {

                    case '1':
                        $res->leftJoin('bidder','constructions.uuid','=','bidder.r_id');
                        $res->where([['bidder.price','<',$where[0]],['bidder.category','=','005001003']]);
                        break;

                    case '2':
                        $res->leftJoin('bidder','constructions.uuid','=','bidder.r_id');
                        $res->where('bidder.category','=','005001003');
                        $res->whereBetween('bidder.price',[$where[1][0],$where[1][1]]);
                        break;

                    case '3':
                        $res->leftJoin('bidder','constructions.uuid','=','bidder.r_id');
                        $res->where('bidder.category','=','005001003');
                        $res->whereBetween('bidder.price',[$where[2][0],$where[2][1]]);
                        break;

                    case '4':
                        $res->leftJoin('bidder','constructions.uuid','=','bidder.r_id');
                        $res->where([['bidder.price','>',$where[3]],['bidder.category','=','005001003']]);
                        break;

                }

            }

        }

        $res = $res->paginate(10);
        //判断是否移动端
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])){
            echo '手机设备';
        }else{
            return view('gcjs',['data'=>$res,'title'=>$title,'price'=>$price,'acode'=>$acode]);
        }

    }

    public function info(RequestandResponse $request,$id)
    {
        $value = $request->session()->get('user_name');
        if(empty($value)){
            return view('yanz');
            die;
        }
        $user = DB::table('constructions')->where('uuid', '=', $id)->get()->toArray();
        return view('gcjs_info',['data'=>$user[0]]);
    }

}