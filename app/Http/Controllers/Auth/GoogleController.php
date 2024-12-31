<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'full_name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make(uniqid()),
                'google_id' => $user->getId(),
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('home'); // điều hướng về trang mong muốn
    }
}
