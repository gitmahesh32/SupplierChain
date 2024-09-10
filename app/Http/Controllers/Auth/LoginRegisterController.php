<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginRegisterController extends Controller
{
  
    /**
     * Register page view
     */
    public function register(): View
    {
        return view('auth.register');
    }


    /**
     * Regiter form submit
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'phone'=>'required|max:20',
            'username'=>'required|string|max:100|unique:users,username',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'username'=> $request->username,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email','username','password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('home')->withSuccess('You have successfully registered & logged in!');
    }
  
    /**
     * Load a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Submit login user form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
          // dd('here');
            $request->session()->regenerate();
            return redirect()->route('home')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'name' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('name');

    } 

    /**
     * Home page
     * 
     */
    public function home(): View
    {
       // dd(Auth::user('name'));
        return view('home');
    } 


    /**
     * Logout
     */

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');
    }
}
