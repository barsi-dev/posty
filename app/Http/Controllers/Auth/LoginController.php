<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        //validate

        return view('auth.login');
    }

    public function store(Request $req)
    {

        $this->validate($req, [
            'username' => 'required',
            'password' => 'required',
        ]);

        //sign-in
        if (!auth()->attempt($req->only('username', 'password'), $req->remember)) {
            return back()->with('status', 'Username or Password is incorrect.');
        }
        //redirect
        return redirect()->route('dashboard');
    }
}
