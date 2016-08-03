<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\UserRegistrationService as Register;
use Illuminate\Http\Request;

/**
 * Class UserRegistrationController
 * @package App\Http\Controllers
 */
class UserRegistrationController extends Controller
{
    protected $register;

    public function __construct(Register $register)
    {
      $this->register = $register;
    }

    public function businessRegister(Requests\PostBusinessRegisterRequest $request)
    {
      if($this->register->businessRegister( $request )){
        return "Congrats !!! You Just Registered your business with us";
      }
      return "Sorry bro";
    }

    /**
     * @return mixed
     */
    public function business()
    {
        return view('register.business');
    }


    public function normal()
    {
        return view('register.normal');
    }



}
