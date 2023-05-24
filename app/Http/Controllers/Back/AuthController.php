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
        try {
            $credentials = $request->only(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                $this->showErrorAlert('Email Or Password was wrong!');
                return back();
            }
            $this->showSuccessAlert("Successfully Login!");
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard.show'));
        } catch (\Exception $exception) {
            report($exception);
            $this->showErrorAlert($exception->getMessage());
            return back();
        }

    }
}
