<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as RequestandResponse;

class NewsController extends Controller
{
    public function news()
    {
        $res = [];
        $res = DB::table('news')->orderBy('id')->paginate(10);
        return tredon_view('news',['data'=>$res]);
    }

    public function news_detail(RequestandResponse $request,$id)
    {
        $user = DB::table('news')->where('id', '=', $id)->get()->toArray();

        return tredon_view('news_detail',['data'=>$user[0]]);
    }

}