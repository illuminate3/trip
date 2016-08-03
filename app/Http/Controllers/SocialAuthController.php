<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAccountService;
use App\Http\Requests;

class SocialAuthController extends Controller
{
//   /**
//    * Redirect the user to the GitHub authentication page.
//    *
//    * @return Response
//    */
//   public function redirectToProvider()
//   {
//       return Socialite::driver('github')->redirect();
//   }
//
//   /**
//    * Obtain the user information from GitHub.
//    *
//    * @return Response
//    */
//   public function handleProviderCallback()
//   {
//       $user = Socialite::driver('github')->user();
//
//       // $user->token;
// }
  public function redirect()
  {
      return Socialite::driver('facebook')->redirect();
  }

  public function callback(SocialAccountService $service)
  {
      // when facebook call us a with token
      $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
       auth()->login($user);
       return redirect()->to('/home');

  }
}
