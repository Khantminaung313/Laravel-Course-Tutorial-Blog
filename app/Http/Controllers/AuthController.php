<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('Auth.register');
    }

    public function store()
    {
        // return view('register.store');

        $formData = request()->validate([
            'name' => ['required','min:3','max:255'],
            'username' => ['required', 'min:3', 'max:255',Rule::unique('users', 'username')],
            'email' => ['required','email',Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Hello '. $user->name . '. Welcome to my blog.');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function post_login()
    {
        $formData = request()->validate([
           'email' => ['required', 'min:3', 'max:255', Rule::exists('users', 'email')],
           'password' => ['required', 'min:8', 'max:255'] 
        ], [
            'email.required' => 'We need your email.',
            'password.min' => 'Your password should at least 8 charactor'
        ]);

        if(auth()->attempt($formData)) {
            if(auth()->user()->is_admin) {
                return redirect('/admin/blogs')->with('success', 'Welcome Back Admin');
            } else {
                return redirect('/')->with('success', 'Welcome Back');
            }
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Email or password was wrong.'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Good Bye');
    }
}
