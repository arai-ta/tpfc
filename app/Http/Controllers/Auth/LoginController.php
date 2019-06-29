<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * 重複した実装を避けるため、 `AuthenticatesUsers::logout` のコードを
     * 次のようにして呼び出す方法を考えた。
     *
     * <code>
     *      use AuthenticatesUsers {
     *          AuthenticatesUsers::logout as logoutDefault;
     *      }
     *
     *      public function logout(Request $request)
     *      {
     *          $this->logoutDefault($request);
     *          return redirect('/home');
     *      }
     * </code>
     *
     * しかし、2つの点でこれは避けてべた書きすることにした。
     *
     *  1. 内部でムダな `redirect()` が呼ばれてしまう
     *  2. そもそもこのログアウトが独自の理由で修正されることがあって、それは実装の共有のメリットを上回りそう
     *      * 「リダイレクト先を違うものにしたい」というのはその例
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/home');
    }
}
