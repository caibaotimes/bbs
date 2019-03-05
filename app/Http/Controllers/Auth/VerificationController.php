<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //设定了所有的控制器动作都需要登录后才能访问
        $this->middleware('auth');
        //只有verify动作使用signed 中间件进行认证，signed中间件是一种由框架提供的很方便的url前面认证方式
        $this->middleware('signed')->only('verify');
        //对verify和resend动作做了频率限制，throttle中间件接收两个参数，这两个参数决定了在给定的分钟数内
        //可以进行的最大请求数
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
