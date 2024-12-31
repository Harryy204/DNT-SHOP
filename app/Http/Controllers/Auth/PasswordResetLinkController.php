<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetTokens;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ],[
            'email.required' => 'Hãy nhập địa chỉ email để lấy lại mật khẩu',
            'email.email' => 'Sai định dạng email',
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return back()->withInput($request->only('email'))->withErrors(['email' => 'Không tìm thấy email']);
        } else {
            $token = Str::random(60);

            PasswordResetTokens::updateOrInsert(
                ['email' => $user->email,],
                ['token' => $token, 'created_at' => now()]
            );

            Mail::to($user->email)->send(new ResetPasswordMail($token, $user->email));
            return back()->with('status','Chúng tôi đã gửi một tin nhắn tới email của bạn');
        }
    }
}
