<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! auth()->attempt($attributes))
        {
            throw validationException::withMessages([
                'email' => "البريد الإلكتروني و/أو كلمة المرور غير صحيحة"
            ]);
        }

        session()->regenerate();
        return redirect('/home')->with('success', 'تم تسجيل الدخول بنجاح');
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/home')->with('success', 'إلى اللقاء!');
    }

}
