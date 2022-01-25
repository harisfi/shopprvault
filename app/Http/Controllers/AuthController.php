<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        try {
            $validated = $request->validated();

            $path = Storage::putFile('public/users', $request->file('profile_pic'));
            $path = Str::of($path)->replaceFirst('public/', '/storage/');

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => 'customer',
                'password' => bcrypt($validated['password']),
                'profile_pic' => $path,
                'approved' => false
            ]);

            return redirect(route('login'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Registration completed, login to continue.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(route('register'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ])->withInput();
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            if (auth()->user()->role == 'admin') {
                return redirect(route('admin.dashboard'));
            } else {
                return redirect(url('/'));
            }
        } else {
            return redirect(route('login'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => 'Email/Password is invalid'
                ]
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
