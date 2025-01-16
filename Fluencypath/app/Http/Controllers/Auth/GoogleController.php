<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {


            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();



          if(!is_null($findUser)){
            Auth::login($findUser);
          } else{
            $findUser = User::create([
              'name' => $user->name,
              'email' => $user->email,
              'google_id' => $user->id,
              'password' => env('GOOGLE_PASSWORD'),
            ]);
            Auth::login($findUser);
          }


            return redirect()->route('home');

    }
}
