<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as RequestandResponse;

class UserController extends Controller
{
    public function user_list()
    {
        $name='';
        $input = $input=Request::all();
        if(empty($input['name'])) {
            $res = DB::table('member')->orderBy('id','desc')->paginate(10);
        }else {
            $res =DB::table('member')
                ->where('name', 'like', '%'.$input['name'].'%')
                ->orderBy('id','desc')
                ->paginate(10);
            $name = $input['name'];
        }
        return view('user.user_list',['data'=>$res,'name'=>$name]);
    }

    public function clear(RequestandResponse $request)
    {
        $request->session()->flush();
        return redirect('/gcjs');
    }

    public function guestbook(RequestandResponse $request)
    {
        $input = $input=Request::all();
        $res  = DB::table('guestbook')->insert([
                'ip'       => $request->getClientIp(),
                'email'    => $input['email'],
                'useranme' => $input['username'],
                'phone'    => $input['phone'],
                'title'    => $input['title'],
                'content'  => $input['content'],
            ]);
        return view('m.guestbook',['data'=>$res]);
    }
}