<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{

    use AuthenticatesUsers;

    function list(){
        // return csrf_token();
        // echo Auth::user();
        // exit;
        // Auth::logout();
        // $request = new Request();
        return Auth::user();
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function getSession(Request $request){
        $all_s = $request->session()->all();
        return $all_s;
    }

    function getLogin(){
        return view('login');
    }

    function postLogin(Request $request){
        $credentials = $request->only('email', 'password');
        // $users = Auth::user();
        if (Auth::attempt($credentials)) {
            $user = User::where('email','=',$request['email'])->get();
            Auth::login($user);
        }
        // echo Auth::attempt(['email' => $request['email'], 'password' => $request['password']);
        // echo $credentials;
        exit;
        // Auth::login($request['email'])
    }

    function register(){
        return view('register');
    }

    function createUser(Request $request){
        $user = new User();
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        if($user->save()){
            return $user;
        }else{
            return "Register failed";
        }
    }
}
