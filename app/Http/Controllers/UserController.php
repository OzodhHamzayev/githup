<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('Auth.index');
    }
    public function Login(UserRequest $request){
        $validated = $request->validated();

        $email = $validated['email'];
        $password = $validated['password'];
        $user = User::query()->where('email', '=', $email)->first();
        if($user == null){
            return redirect()->route('login');
        }

        $isPassword = password_verify($password, $user->password);
        if($isPassword){
            Auth::login($user);
        return redirect()->route('dashboard');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
