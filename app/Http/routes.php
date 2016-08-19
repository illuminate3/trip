<?php
/*
Search User's Booking
Search Hotel
Search Tour
Search Vehicle
Search Venue => "size",""
Search

-----------------------------------------------------------------
Login As Pro ==> Send Request for pro account [ Adding Business ]
Admin -> confirm . [ --  --]

*/

Route::group(['middlewareGroups' => ['web']], function () {
    //Main site
    Route::get('/', 'SiteController@getHome');
    Route::get('/about', 'SiteController@getAbout');
    Route::get('/faq', 'SiteController@getFaq');
    //Payment Options Page ===> LEFT
    Route::get('/payment-options', 'SiteController@getPaymentOptions');

    Route::get('/blog', 'SiteController@getBlog');
    Route::get('/contact', 'SiteController@getContact');
    Route::resource('/posts', PostsController::class);

    // =====> Design Left
    Route::get('my-bookings', "ProfileController@getUserBooking");

    Route::get('booking/room', 'SiteController@getHotelBooking');

    //Vehicle Routes
    Route::resource('/vehicles', VehiclesController::class);
    Route::resource('/vehicles/{slug}/gallery', Gallery\VehiclesGalleryController::class);
    Route::resource('/vehicles/{slug}/contact', Contact\VehiclesContactController::class);
    Route::resource('/vehicles/{slug}/list', VehicleDescriptionsController::class);

    //Hotels
    Route::resource('/hotels', HotelsController::class);
    Route::resource('/hotels/{slug}/room', RoomsController::class);
    Route::resource('/hotels/{slug}/gallery', Gallery\HotelsGalleryController::class);
    Route::resource('/hotels/{slug}/contact', Contact\HotelsContactController::class);

    Route::get('hotels/rooms/create', 'RoomsController@create');

    //Restaurant Routes
    Route::resource('/restaurants', RestaurantsController::class);
    Route::resource('/restaurants/{slug}/rooms', RoomsController::class);
    Route::resource('/restaurants/{slug}/gallery', Gallery\RestaurantsGalleryController::class);
    Route::resource('/restaurants/{slug}/contact', Contact\RestaurantsContactController::class);

    //Tours Routes
    Route::resource('/tours', ToursController::class);
    Route::resource('/tours/{slug}/gallery', Gallery\ToursGalleryController::class);
    Route::resource('/tours/{slug}/contact', Contact\ToursContactController::class);
    Route::resource('/tours/{slug}/package', PackageController::class);
    Route::resource('/tours/{slug}/package/{packageSlug}/gallery', Gallery\PackagesGalleryController::class);

    //Venues Controllers

    Route::resource('/venues', VenuesController::class);
    Route::resource('/venues/{slug}/gallery', Gallery\VenuesGalleryController::class);
    Route::resource('/venues/{slug}/contact', Contact\VenuesContactController::class);
    //Authentication
    Route::auth();
    //Laravel Social Login For Login Authentication
    Route::get('social/login/redirect/{provider}', ['uses' => 'SocialAuthController@redirectToProvider', 'as' => 'social.login']);
    Route::get('social/login/{provider}', 'SocialAuthController@handleProviderCallback');

    Route::get('/home', 'HomeController@index');

    Route::get('search-results', 'SearchController@searchByName');
    Route::get('search-address', 'SearchController@searchByAddress');

    /*Pusher Notification*/
    Route::get('/bridge', function () {
        $pusher = Illuminate\Support\Facades\App::make('pusher');
        $date = new DateTime();
        $pusher->trigger('notification',
            'get-user-notification',
            array(
                'text' => 'A new Business has been made',
                'userId' => '1',
                'type' => 'success',
                'created_at' => $date->format('d M Y')
            ));
        return view('welcome');
    });
    Route::get('/bridge/booking', function () {
        $pusher = Illuminate\Support\Facades\App::make('pusher');
        $date = new DateTime();
        $pusher->trigger('notification',
            'get-booking-notification',
            array(
                'text' => 'A new Booking has been made',
                'userId' => '1',
                'type' => 'success',
                'created_at' => $date->format('d M Y')
            ));
        return view('welcome');
    });
    Route::get('/bridge/booking/error', function () {
        $pusher = Illuminate\Support\Facades\App::make('pusher');
        $date = new DateTime();
        $pusher->trigger('notification',
            'get-booking-notification',
            array(
                'text' => 'An Error Occured while booking',
                'userId' => '1',
                'type' => 'alert',
                'created_at' => $date->format('d M Y')
            ));
        return view('welcome');
    });
    //Pusher Notification broadcast
    Route::get('/broadcast', function () {

        event(new \App\Events\TestEvent('Show !', 1));

        return view('welcome');
    });
    Route::controller('notifications', NotificationsController::class);
    Route::resource('/reviews', ReviewsController::class);

    //Test Mail Sending Newsletter and booking
    Route::get('/send-mail', 'MailController@sendBookingMail');
    Route::post('/send-mail', 'MailController@sendNewsletterMail');

    Route::resource('profile/booking', BookingsController::class);

}); // Web Middleware
// Dashboard For SuperAdmin
Route::group(['middleware' => ['web', \App\Http\Middleware\AuthenticateAdmin::class], 'prefix' => 'dash'], function () {
    Route::get('/', function () {
        return view('dashboard.dash');
    });
    Route::get('settings', 'AdminDashController@getSettings');

    //
    //Route::controller('dash',AdminDashController::class);

    //Old Controllers
    //
    Route::get('/restaurants', 'AdminDashController@getRestaurants');
    Route::get('/restaurants/create', 'AdminDashController@getRestaurantsCreate');

    Route::get('/hotels', 'AdminDashController@getHotels');
    Route::get('/hotels/create', 'AdminDashController@getHotelCreate');

    Route::get('/vehicles', 'AdminDashController@getVehicles');
    Route::get('/vehicles/create', 'AdminDashController@getVehiclesCreate');

    Route::get('/tours', 'AdminDashController@getTours');
    Route::get('/tours/create', 'AdminDashController@getTourCreate');

    Route::get('/venues', 'AdminDashController@getVenues');
    Route::get('/venues/create', 'AdminDashController@getVenueCreate');

    Route::resource('carousel', CarouselsController::class);
    Route::resource('faq', FaqController::class);

    Route::get('/approve/{model}/{id}', 'AdminDashController@approve');
    Route::get('/suspend/{model}/{id}', 'AdminDashController@suspend');
});
//Business User Dashboard
Route::group(['middleware' => ['web', \App\Http\Middleware\AuthenticateBusiness::class], 'before' => 'auth', 'prefix' => 'profile'], function () {
    Route::get('/', 'ProfileController@getProfile');
    Route::get('business', 'ProfileController@getBusiness');
    Route::get('add', 'ProfileController@getAddBusiness');
    Route::resource('offer', OffersController::class);

});

//API ROUTES
Route::group(['prefix' => '/api/v1/', 'middleware' => 'api'], function () {
    Route::resource('users', Api\UsersController::class);
    Route::resource('restaurants', Api\RestaurantsController::class);
    Route::resource('vehicles', Api\VehiclesController::class);
    Route::resource('tours', Api\ToursController::class);
    Route::resource('hotels', Api\HotelsController::class);
    Route::resource('venues', Api\VenuesController::class);
});
