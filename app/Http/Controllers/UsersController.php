<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /*
     * 用户注册页面
     */
    public function register()
    {
        return  view('user.register');
    }
    /*
     * 用户注册操作方法
     */
    public function store(Requests\UserRegisterRequest $request)
    {
        // 生成邮箱确认码（随机值），添加默认头像
        $data = [
            'confirm_code' => str_random(48),
            'avatar' => 'http://lorempixel.com/256/256/?89002'
        ];
        // 创建新用户数据到数据库
        $user = User::create(array_merge($request->all(), $data));
        $id = $user->id;
        Auth::loginUsingId($id);
        // 邮件数据
        $newData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'confirm_code' => $data['confirm_code'],
            'subject' => '邮箱确认邮件'
        ];
        // 发送邮箱确认邮件
        $flag = Mail::send('emails.register', $newData, function($message) use ($newData) {
            $to = $newData['email'];
            $message ->to($to)->subject($newData['subject']);
        });
        // 发送成功或失败后跳转
        if ($flag) {
            return redirect('/user/register/welcome')->with('success','已发送确认邮件，请进入邮箱查收！');
        } else {
            return redirect('/user/register/welcome')->withErrors('发送邮件失败，请重试！');
        }
    }
    /*
     * 邮箱确认操作
     */
    public function confirm($confirm_code)
    {
        // 获取邮箱确认码，搜索对应用户
        $user = User::where('confirm_code', $confirm_code)->first();
        // 未搜索到用户操作
        if (is_null($user)) {
            return redirect('/')->withErrors('邮件已过期，验证失败');
        }
        // 搜索到用户后修改邮箱确认码及邮箱验证状态
        $user->is_confirmed = 1;
        $user->confirm_code = str_random(48);
        $user->save();
        return redirect('user/login')->with('success', '邮箱验证成功！');
    }
    /*
     * 注册成功提示页面
     */
    public function welcome()
    {
        return view('user.welcome');
    }
    /*
     * 用户登录页
     */
    public function login()
    {
        return view('user.login');
    }
    /*
     * 用户登录操作
     */
    public function signIn(Requests\UserLoginRequest $request)
    {
        // 判断登录类型，是邮箱登录或用户名登录
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        // 将提交的login的值复制给邮箱或用户名字段
        $request->merge([$field => $request->input('login')]);
        // 判断用户登录是否成功
        if (Auth::attempt($request->only($field, 'password'))) {
           return redirect('/')->with('success', '登录成功！');
        } else {
            return redirect('/user/login')->withInput()->withErrors('用户名或密码错误，请重新输入！');
        }
    }
    /*
     * 用户注销退出操作
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', '注销退出成功！');
    }
    /*
     * 修改登录密码页面
     */
    public function editPwd()
    {
        return view('user.changePwd');
    }
    /*
     * 修改密码操作
     */
    public function updatePwd(Requests\UserPasswordRequest $request)
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        if(!Hash::check($request->input('old_password'), $user->password)){
            return redirect('user/change_password')->withErrors('原密码输入错误，请重新输入！');
        }
        $result = User::where('id', $id)->update([
            'password' => Hash::make($request->input('password'))
        ]);
        if($result){
            Auth::logout();
            return redirect('user/login')->with('success', '密码修改成功，请重新登录！');
        }else{
            return redirect('user/change_password')->withErrors('操作出现异常，请稍后重试！');
        }
    }
    /*
     * 修改头像视图
     */
    public function avatar()
    {
        return view('user.avatar');
    }
    /*
     * 保存上传的头像，修改头像数据
     */
    public function updateAvatar()
    {

    }
}
