<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as RequestandResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ZhuceController extends Controller
{
    public function zhuce(RequestandResponse $request)
    {
        if($request->isMethod('post'))
        {
            $input = $input=Request::all();
            if(empty($input['name']) || empty($input['email']) || empty($input['phone'] || empty($input['password']))) {
                return redirect('/zhuce');
            }
            $results =  DB::table('member')->where('email', '=', $input['email'])->get()->toArray();

            if(!empty($results)) {
                echo '此邮箱已经注册过...<a href="/zhuce">重新注册</a>';
                die;
            }

            $flog = DB::insert('insert into member (`name`,`email`,`phone`,`password`) values (?,?,?,?)',
                [$input['name'],$input['email'],$input['phone'],md5($input['password'])]);

            if($flog) {
                $request->session()->put('user_name',$input['name']);
                $request->session()->put('user_email',$input['email']);
            }
            return redirect('/gcjs');
        }else{
            return view('user.create');
        }
    }

    public function denglu(RequestandResponse $request)
    {
        if($request->isMethod('post')){
            $input = $input=Request::all();
            $results = DB::select('select * from member where email = :email and password = :password',
                [
                    'email' => $input['email'],
                    'password' => md5($input['password'])
                ]);
            if(empty($results))
            {
                echo '邮箱或者密码错误';
                echo "<a href='/denglu'>继续登录</a>";
                die;
            }else{
                $request->session()->put('user_name',$results[0]->name);
                $request->session()->put('user_email',$results[0]->email);
                return redirect('/gcjs');
            }

        }else{
            return view('user.denglu');
        }
    }
}