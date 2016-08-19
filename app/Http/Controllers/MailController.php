<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Event;
use App\Events\SendBookingMail;
use App\Events\SendNewsletterMail;

class MailController extends Controller
{

    public function sendBookingMail(){
    	$id = Auth::user()->id;
		Event::fire(new SendBookingMail($id));
    }
    public function newNewsletterSubscribed()
    {
        return 'Newsletter Subscribed'; 
    }

    public function sendNewsletterMail(Request $request){
    	if(Event::fire(new SendNewsletterMail($request->get('email'),'General '))){
    	   	session()->flash('sucMsg','Newsletter Subscribed Sucessfully');
	    	return back();
    	}
    	session()->flash('errMsg','Newsletter Couldn\'t be subscribed');
    	return redirect('hotels');
    }
}
