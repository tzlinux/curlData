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
    public function index(RequestandResponse $request)
    {

        $res = [];
        $title = '';
        $price = '-1';

        $input = $input=Request::all();
        if(!empty($input['title'])) {

            $value = $request->session()->get('user_name');
            if(empty($value)){
                return view('yanz');
                die;
            }
            $res =DB::table('constructions')
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
                case '0':

                    $res =DB::table('constructions')
                        ->leftJoin('bidder','constructions.uuid','=','bidder.r_id')
                        ->where('bidder.price','<',$where[0])
                        ->paginate(10);
                    break;

                case '1':

                    $res =DB::table('constructions')
                        ->leftJoin('bidder','constructions.uuid','=','bidder.r_id')
                        ->whereBetween('bidder.price',[$where[1][0],$where[1][1]])
                        ->paginate(10);
                    break;

                case '2':

                    $res =DB::table('constructions')
                        ->leftJoin('bidder','constructions.uuid','=','bidder.r_id')
                        ->whereBetween('bidder.price',[$where[2][0],$where[2][1]])
                        ->paginate(10);
                    break;

                case '3':

                    $res =DB::table('constructions')
                        ->leftJoin('bidder','constructions.uuid','=','bidder.r_id')
                        ->where('bidder.price','>',$where[3])
                        ->paginate(10);
                    break;

            }

            $price = $input['price'];

        }else{
            $res = DB::table('constructions')->paginate(10);
        }

        return view('gcjs',['data'=>$res,'title'=>$title,'price'=>$price]);
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