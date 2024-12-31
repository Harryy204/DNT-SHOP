<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetTokens;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        $token = PasswordResetTokens::where('token',$request->token)->first();
        if(!$token){
            return abort(403,'Không tìm thấy token');
        }
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => ['confirmed', Rules\Password::defaults()],
        ],[
           'password.confirmed' => 'Mật khẩu không trùng nhau', 
           'password.min' => 'Mật khẩu tối thiểu 8 kí tự', 
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        PasswordResetTokens::find($user->email)->delete();
        return redirect()->route('login')->with('success','Đổi mật khẩu thành công');
    }
}
