<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
  public function googleLogin (Request $request) {
    return Socialite::driver('google')->redirect();
  }

  public function googleCallback (Request $request) {
    $user_social = Socialite::driver('google')->user();

    $terms = [
      'email' => 'false',
      'tac' => 'true',
      'privacy' => 'true'
    ];

    $user_email = User::where('email', $user_social->email)->first();

    if ($user_email != null && strlen($user_email->external_id) == 0) return redirect()->back()->withErrors('Correo ya existe');

    $user = User::where('external_id', $user_social->id)->where('external_auth', 'google')->first();

    if ($user != null) {
      Auth::login($user);
      return redirect('/')->with('success', 'Sesión iniciada con Google');
    }

    $user = User::create([
      'name' => $user_social->name,
      'email' => $user_social->email,
      'email_verified_at' => now(),
      'user_type' => 'client',
      'terms' => json_encode($terms),
      'avatar' => $user_social->avatar,
      'external_id' => $user_social->id,
      'external_auth' => 'google'
    ]);

    Auth::login($user);
    return redirect('/')->with('success', 'Sesión iniciada con Google');
  }
}
