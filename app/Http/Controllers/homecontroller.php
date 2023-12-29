<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;


class homecontroller extends Controller
{
    public function index(){
        return view('home');
    }
    public function login(){
       
        return view('login');

    }
    public function verify(Request $request)
    {
        // return request() ->all();
        request()->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(\Auth::attempt(['email' => request('email'),'password' => request('password')])){
            return redirect('home');
        }
        return redirect('login')->withErrors('wrong email or password!');
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
 
        // if (\Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('home');
        // }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    
    }
    public function register(){
        return view('register');
        ///////////if validation is done in this function ,the page wont be redirected to register  page //////
        // request()->validate(
        //     ['email'=>'required|unique:users,email','password'=>'required']
        // );
        // $validatedData = request()->validate([
        //     'name' => ['required', 'unique:users', 'min:5'],
        //     'password' => ['required'],
        //     'password_confirmation' =>['required','passwored'],
        //     'email'=> ['required','unique:users,email']
        // ]);
       
       
    }
    public function store(){
        $validatedData = request()->validate([
            'name' => ['required', 'unique:users', 'min:5'],
            'password' => ['required'],
            'password_confirmation' =>['required'],
            'email'=> ['required','unique:users,email']
        ]);
    $user= new User;
    $user->name=request('name');
    $user->email=request('email');
    $user->password=request('password');
    $user->save();
    // return request()->all();
    // return redirect('login');
    return redirect('/login');
        // return request()->all();
        // request()->validate(
        //     ['email'=>'required|unique:users,email','password'=>'required']
        // );

        ///////////validation can be done by any of the above and below method//////////////////
       
        
    }
    public function user(){
        $users =User::all();
        return view('users',compact('users'));
    }
    public function edit($id){
        $users =User::find($id);
        return view('edit',compact('users'));
    }
    public function update($id){
        request()->validate(['email'=>'required|unique:users,email','name'=>'required|min:5']);
        $user=User::find($id);
        $user->name=request('name');
        $user->email=request('email');
        $user->save();
        return redirect('users');

    }
    public function delete($id){
        $user =User::find($id);
        $user->delete();
        return redirect('users');
        // public function logout(){
        //     auth()->logout();
        //     return redirect('login');
    
        // }
       
    }
    public function profile(){
        $id=auth()->user()->id();
            $user= User::find($id);
            return view('profile',compact('user'));

    }
    
        public function profile_update(Request $request,$id){
            $validated = $request->validate([
                'email' => 'required|unique:users|email',
                'name' => 'required|min:5',
            ]);
            $user = User::find($id);
            $user->name = request('name');
            $user->email = request('email');
            $user->save();
            return redirect('users'); 
        }
}
