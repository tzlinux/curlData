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
        if($request->isMethod('post')) {

            $input = $input=Request::all();
            $token = isset($input['token']) ? $input['token'] : '';

            if ($request->session()->exists('token') && $token!='') {
                $request->session()->forget('token');
            }
            else{
                return redirect('/guestbook');
            }
            try{
                if(empty($input['username']) || empty($input['email']) || empty($input['content'])) {
                    echo '用户,邮箱,内容必须填写';
                    die;
                }
                $res  = DB::table('guestbook')->insert([
                        'ip'       => $request->getClientIp(),
                        'username' => $input['username'],
                        'email'    => $input['email'],
                        'phone'    => $input['phone'],
                        'title'    => $input['title'],
                        'content'  => $input['content'],
                    ]);
                if($res){
                    echo '感谢您的反馈...';
                }
            }catch (\Exception $e){
                echo '系统错误'.$e->getMessage();
            }

        }else{
            //防止表单重复提交
            $token = md5(uniqid().time());
            $request->session()->put('token',$token);
            return view('m.guestbook',['token'=>$token]);
        }

    }
}