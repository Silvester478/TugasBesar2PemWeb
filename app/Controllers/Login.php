<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        if(session()->get('role')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Login'])
        ];
        return view('auth-login', $data);
    }

    public function doLogin()
    {

        $loginData = $this->user->where([
            'email' => $this->request->getVar('email'),
            'password' => sha1($this->request->getVar('password'))
        ])->first();

        if($loginData) {
            session()->set($loginData);
            return redirect()->route('dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function doLogout()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}
