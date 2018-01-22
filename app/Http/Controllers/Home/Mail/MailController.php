<?php

namespace App\Http\Controllers\Home\Mail;

use Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function sendMail()
    {

        $name = '学院君';
        $flag = Mail::send('test',['name'=>$name],function($message){
            $to = '1457300835@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }
}
