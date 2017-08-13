<?php
namespace App\Http\Controllers\user;

//use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as RequestandResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class XinwenController extends Controller
{
    public function addnews(RequestandResponse $request)
    {
        $res = [];
        $res = DB::table('news')->orderBy('id')->paginate(10);
        return tredon_view('user.newsadd',['data'=>$res]);
    }

    public function news_action()
    {
        $input = $input=Request::all();
        $flog = DB::insert('insert into news (`title`,`content`,`status`,`ctime`) values (?,?,?,?)',
            [$input['title'],$input['content'],1,time()]);

        echo "发布成功,<a href='/news'>点击查看</a>";
    }
}