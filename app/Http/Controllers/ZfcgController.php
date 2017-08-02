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
        $start = '';
        $end   = '';
        $input = $input=Request::all();
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

        }elseif((!empty($input['start'])) && (!empty($input['end']))) {

            $value = $request->session()->get('user_name');
            if(empty($value)){
                return view('yanz');
                die;
            }

            $res =DB::table('railways')
                ->leftJoin('bidder','railways.uuid','=','bidder.r_id')
                ->whereBetween('bidder.price',[3,20])
                ->paginate(10);
            $start = $input['start'];
            $end   = $input['end'];

        }else{
            $res = DB::table('railways')->paginate(10);
        }

        return view('zfcg',['data'=>$res,'title'=>$title,'start'=>$start,'end'=>$end]);
    }

    public function info(RequestandResponse $request,$id)
    {
        $value = $request->session()->get('user_name');
        if(empty($value)){
            return view('yanz');
            die;
        }
        $user = DB::table('railways')->where('uuid', '=', $id)->get()->toArray();

        return view('zfcg_info',['data'=>$user[0]]);
    }

}