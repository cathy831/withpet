<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectPath()
    //ログインした際の画面の遷移先はログイン直前のページ
    {
        $path = \Session::pull('url.intended');
        return $path;
    }
    
    public function index()
    {
        // if (!session()->has('url.intended')) {
        //     session(['url.intended' => url()->previous()]);
        // }
        // return redirect('login');
    }
    
    protected function loggedOut(\Illuminate\Http\Request $request)
    //ログアウトした際の画面遷移先は/top
    {
        return redirect('/top');
    }
}
