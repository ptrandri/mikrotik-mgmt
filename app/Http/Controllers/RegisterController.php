<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Session;


use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'password_confirmation' => 'required|same:password',
            'checkbox' =>'required',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

       return redirect('/login')->with('success', 'Registration Successful Please Log In');
    }
}
