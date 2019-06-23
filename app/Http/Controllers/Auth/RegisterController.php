<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
     * ユーザの登録処理を行うコントローラ。
     *
     * - showRegistrationForm メソッドで表示する画面を決定する。
     * - register メソッドで登録処理を行う。
     *      - register はバリデーション、イベント発行、リダイレクトなどの処理が逐次的に書かれている
     *      - ユーザ登録処理の本体は $this->create に移譲している
     *          - これを宣言していないのが気持ち悪い
     *
     * これらはtraitに実装がある。
     *
     * @see RegistersUsers::showRegistrationForm()
     * @see RegistersUsers::register()
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
