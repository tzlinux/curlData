<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Construction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

Class GcjsController extends Controller
{
    public function index()
    {
        $res = [];
        $title = '';
        $input = $input=Request::all();
        if(empty($input['title'])) {
            $res = DB::table('constructions')->paginate(10);
        }else {
            $res =DB::table('constructions')
                ->where('title', 'like', '%'.$input['title'].'%')
                ->paginate(10);
            $title = $input['title'];
        }

        return view('gcjs',['data'=>$res,'title'=>$title]);
    }

    public function info($id)
    {
        $user = DB::table('constructions')->where('id', '=', $id)->get()->toArray();
        return view('gcjs_info',['data'=>$user[0]]);
    }

}