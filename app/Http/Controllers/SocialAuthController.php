<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAccountService;
use App\Http\Requests;
use App\User;

class SocialAuthController extends Controller
{
  public $businessRedirect = '/business';
  public $adminRedirect = '/dash';
  public $normalRedirect = '/';
  public $socialService;

  public function __construct(SocialAccountService $service){
    $this->socialService = $service;
  }
  public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
     public function handleProviderCallback($provider)
    {
     //notice we are not doing any validation, you should do it
        $providerList = ['facebook','google'];
        if(in_array($provider, $providerList)){
          $providerUser = Socialite::driver($provider)->user();
          
          // stroing data to our use table and logging them in
          $user = $this->socialService->createOrGetUser($provider,$providerUser);
          auth()->login($user);
          return redirect('/dash');
        }
        return redirect('/');
         
    }
    //OLD
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
