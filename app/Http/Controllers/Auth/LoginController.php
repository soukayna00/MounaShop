<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        Session::put('id', $user->id);
        Session::put('name', $user->name);
        Session::put('photo', $user->photo);

    }

    public function logout(Request $request)
    {
        Session::forget('id');
        Session::forget('name');



        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

}
