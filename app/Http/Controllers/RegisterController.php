<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:255']
        ]);

        auth()->login($user = User::create($attributes));
        auth()->login($user);
        return redirect('/home')->with('success', 'تم إنشاء حسابك بنجاح!');
    }

}
