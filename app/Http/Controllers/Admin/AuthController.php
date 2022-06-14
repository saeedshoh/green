<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Метод, который автоматически вызывается при создании объектов..
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Показать форму входа в админ-панель.
     */
    public function showForm()
    {
        return view('auth.login');
    }

     /**
     * Обработка запроса на вход в админ-панель .
     */
    public function login(Request $request)
    {
        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])) {
            toast('Вы успешно авторизовались', 'success');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withErrors('Неверные учетные данные.');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->withErrors('Вы успешно вышли из системы.');
    }
}
