<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/added';
    //protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|email|min:4|max:50|unique:users,mail',
            'password' => 'required|regex:/^[a-zA-Z0-9]+$/|min:4|max:12|confirmed|unique:users,password',
            'password_confirmation' => 'required|regex:/^[a-zA-Z0-9]+$/|min:4|max:12|',
        ],[
            'username.required' => '名前を入力して下さい',
            'username.min' => '名前は4文字以上で入力して下さい',
            'username.max' => '名前は12以下で入力して下さい',
            'mail.required' => 'メールアドレスを入力して下さい',
            'mail.email' => '正しいメールアドレスを入力して下さい',
            'mail.min' => 'メールアドレスは4文字以上で入力して下さい',
            'mail.max' => 'メールアドレスは50文字以下で入力して下さい',
            'mail.unique' => 'そのメールアドレスは既に登録されています',
            'password.required' => 'パスワードを入力して下さい',
            'password.regex' => '半角英数字で入力して下さい',
            'password.min' => 'パスワードは4文字以上で入力して下さい',
            'password.max' => 'パスワードは12文字以下で入力して下さい',
            'password.confirmed' => '入力したパスワードが一致しません',
            'password.unique' => 'そのパスワードは既に登録されています'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $this->validator($data)->validate();
            $this->create($data);
            return redirect('/added');
        }
        return view('auth.register');
    }

    public function added(){
        $user = DB::table('users')->latest()->first();
        return view('auth.added',compact('user'));
    }
}
