<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;
use App\SocialAccount;
class SocialAccountService
{
  public function createOrGetUser($provider, ProviderUser $providerUser)
   {
       $account = SocialAccount::whereProvider($provider)
           ->whereProviderUserId($providerUser->getId())
           ->first();

       if ($account) {
           return $account->user;
       } else {

           $account = new SocialAccount([
               'provider_user_id' => $providerUser->getId(),
               'provider' => $provider
           ]);

           $user = User::whereEmail($providerUser->getEmail())->first();

           if (!$user) {

               $user = User::create([
                   'email' => $providerUser->getEmail(),
                   'name' => $providerUser->getName(),
               ]);
           }

           $account->user()->associate($user);
           $account->save();

           return $user;

       }

   }

}
