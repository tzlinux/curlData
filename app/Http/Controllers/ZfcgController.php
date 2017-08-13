<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as RequestandResponse;

/**
 * Created by PhpStorm.
 * User: tredon
 * Date: 2017/7/19
 * Time: 20:00
 */
class ZfcgController extends Controller
{
    public function index(RequestandResponse $request)
    {
        $res = [];
        $title = '';
        $price = '-1';

        $input = $input=Request::all();
        $active = isset($input['active']) ? $input['active'] : '';
        $title = isset($input['title']) ? $input['title'] : '';
        $price = isset($input['price']) ? $input['price'] : '';
        $acode = isset($input['acode']) ? $input['acode'] : '';

        if(!empty($input['title'])) {

            $value = $request->session()->get('user_name');
            if(empty($value)){
                return view('yanz');
                die;
            }
            $res =DB::table('railways')
                ->where('title', 'like', '%'.$input['title'].'%')
                ->paginate(10);
            $title = $input['title'];

        }elseif(!empty($input['price'])) {

            $value = $request->session()->get('user_name');
            if(empty($value)){
                return view('yanz');
                die;
            }

            $where = [
                0 =>['5000000'],
                1 =>['5000000','10000000'],
                2 =>['10000000','50000000'],
                3 =>['5000000'],
            ];

            switch($input['price']) {
                case '1':

                    $res =DB::table('railways')
                        ->leftJoin('bidder','railways.uuid','=','bidder.r_id')
                        ->where([['bidder.price','<',$where[0]],['bidder.category','=','005003003']])
                        ->paginate(10);
                    break;

                case '2':

                    $res =DB::table('railways')
                        ->leftJoin('bidder','railways.uuid','=','bidder.r_id')
                        ->where('bidder.category','=','005003003')
                        ->whereBetween('bidder.price',[$where[1][0],$where[1][1]])
                        ->paginate(10);
                    break;

                case '3':

                    $res =DB::table('railways')
                        ->leftJoin('bidder','railways.uuid','=','bidder.r_id')
                        ->where('bidder.category','=','005003003')
                        ->whereBetween('bidder.price',[$where[2][0],$where[2][1]])
                        ->paginate(10);
                    break;

                case '4':

                    $res =DB::table('railways')
                        ->leftJoin('bidder','railways.uuid','=','bidder.r_id')
                        ->where([['bidder.price','>',$where[0]],['bidder.category','=','005003003']])
                        ->paginate(10);
                    break;

            }

            $price = $input['price'];
        }else{
            $res = DB::table('railways')->paginate(10);
        }

        return tredon_view('zfcg',['data'=>$res,'title'=>$title,'price'=>$price]);
    }

    public function info(RequestandResponse $request,$id)
    {
        $value = $request->session()->get('user_name');
        if(empty($value)){
            return view('yanz');
            die;
        }
        $user = DB::table('railways')->where('uuid', '=', $id)->get()->toArray();

        return tredon_view('zfcg_info',['data'=>$user[0]]);
    }

}