<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: tredon
 * Date: 2017/7/19
 * Time: 20:00
 */
class ZfcgController extends Controller
{
    public function index()
    {
        $res = [];
        $title = '';
        $input = $input=Request::all();
        if(empty($input['title'])) {
            $res = DB::table('railways')->paginate(10);
        }else {
            $res =DB::table('railways')
                ->where('title', 'like', '%'.$input['title'].'%')
                ->paginate(10);
            $title = $input['title'];
        }

        return view('zfcg',['data'=>$res,'title'=>$title]);
    }

    public function info($id)
    {
        $user = DB::table('railways')->where('id', '=', $id)->get()->toArray();

        return view('zfcg_info',['data'=>$user[0]]);
    }

}