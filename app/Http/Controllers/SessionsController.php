<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only'  =>  ['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
           session()->flash('success', 'Welcome back');
           $fallback = route('users.show', Auth::user());
           return redirect()->intended($fallback);
        } else {
            session()->flash('danger', 'Sorry, email or password not match');
            return redirect()->back()->withInput();
        }

        return ;
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '退出成功');
        return redirect('login');

    }
}
