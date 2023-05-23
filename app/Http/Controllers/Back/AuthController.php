<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Back\AuthLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function showLoginForm()
    {
        return view('back.auth.login');
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            $this->showErrorAlert('Email Or Password was wrong!');
            return back();
        }

        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard.show'));
    }
}
