<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Services\BusinessService;
class ProfileController extends Controller
{
	public $business;

	public function __construct(BusinessService $business)
	{
		$this->business = $business;		
        $this->middleware('auth');
	}

    public function getBusiness()
    {
        $userId = Auth::user()->id;
    	$businesses = $this->business->getBusinessUser($userId);

    	/*dd($businesses);*/
    	return view('profile.business', compact('businesses'));
    	
    }

    public function getAddBusiness()
    {
        return view('profile.addBusiness');
    }
}
