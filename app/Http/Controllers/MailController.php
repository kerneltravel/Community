<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $name = config('mail.from.name');
        $flag = Mail::send('emails.test',['name'=> $name],function($message){
            $to = '821579251@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }
}
