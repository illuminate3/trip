    <?php

    Route::group(['middlewareGroups'=> ['web'] ],function(){ 
        //Main site
        Route::get('/', 'SiteController@getHome');
        Route::get('/about','SiteController@getAbout');
        Route::get('/faq','SiteController@getFaq');
        Route::get('/blog','SiteController@getBlog');
        Route::get('/contact','SiteController@getContact');
        Route::resource('/posts', PostsController::class);
                
        
        //Vehicle Routes
        Route::resource('/vehicles', VehiclesController::class);
        Route::resource('/vehicles/{slug}/gallery', Gallery\VehiclesGalleryController::class);
        Route::resource('/vehicles/{slug}/contact', Contact\VehiclesContactController::class);
    
        //Hotels
        Route::resource('/hotels', HotelsController::class);
        Route::resource('/hotels/{slug}/room', RoomsController::class);
        Route::resource('/hotels/{slug}/gallery',Gallery\HotelsGalleryController::class);
        Route::resource('/hotels/{slug}/contact',Contact\HotelsContactController::class);
    
        Route::get('hotels/rooms/create','RoomsController@create');
    
    
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
    
        //Route::resource('tours/packages', PackageController::class);
        Route::post('/contact/create','ContactsController@store');
    
        //Venues Controllers
    
        Route::resource('/venues', VenuesController::class );
        Route::resource('/venues/{slug}/gallery', Gallery\VenuesGalleryController::class);
        Route::resource('/venues/{slug}/contact', Contact\VenuesContactController::class);
    
        Route::resource('profile/booking',BookingsController::class);
        //Laravel Social Login For Login Authentication
        
        Route::get('social/login/redirect/{provider}', ['uses' => 'SocialAuthController@redirectToProvider', 'as' => 'social.login']);
        Route::get('social/login/{provider}', 'SocialAuthController@handleProviderCallback');
    
        Route::auth();
        
        Route::get('/home', 'HomeController@index');
    
        Route::get('search',function(){
           return view('search.index');
        });
    
        Route::post('searchByName','SearchController@searchByName');
    
        /*Pusher Notification*/
        Route::get('/bridge', function() {
            $pusher = Illuminate\Support\Facades\App::make('pusher');
    
            $pusher->trigger( 'test-channel',
                'test-event',
                array('text' => 'Preparing the Pusher Laracon.eu workshop!'));
    
            return view('welcome');
        });
    
        Route::get('/broadcast', function() {
    
            event(new \App\Events\TestEvent('Broadcasting in Laravel using Pusher!'));
    
            return view('welcome');
        });
        Route::controller('notifications', 'NotificationsController');
    
       
    
        Route::resource('/reviews', ReviewsController::class);
    


    //Test Mail Sending Newsletter and booking        
    Route::get('/send-mail','MailController@sendBookingMail');
    Route::post('/send-mail','MailController@sendNewsletterMail');
    }); // Web Middleware
 // Dashboard For SuperAdmin
    Route::group(['middleware' => ['web',\App\Http\Middleware\AuthenticateAdmin::class],'before'=> 'business','prefix'=>'dash'], function () {
        Route::get('/',function(){
           return view('dashboard.dash');
        });
        //Route::controller('dash',AdminDashController::class);
        

        
        //Old Controllers
        Route::get('/restaurants','AdminDashController@getRestaurants');
        Route::get('/restaurants/create','AdminDashController@getRestaurantsCreate');

        Route::get('/hotels','AdminDashController@getHotels');
        Route::get('/hotels/create','AdminDashController@getHotelCreate');

        Route::get('/vehicles','AdminDashController@getVehicles');
        Route::get('/vehicles/create','AdminDashController@getVehiclesCreate');

        Route::get('/tours','AdminDashController@getTours');
        Route::get('/tours/create','AdminDashController@getTourCreate');

        Route::get('/venues','AdminDashController@getVenues');
        Route::get('/venues/create','AdminDashController@getVenueCreate');
        
        Route::resource('carousel',CarouselsController::class);
        Route::get('/approve/{model}/{id}','AdminDashController@approve');
        Route::get('/suspend/{model}/{id}','AdminDashController@suspend');


    });
//Business User Dashboard
    Route::group(['middleware'=>['web',\App\Http\Middleware\AuthenticateBusiness::class], 'before' => 'auth'],function(){

        Route::get('/profile','SiteController@getProfile');
        Route::get('/profile/business','ProfileController@getBusiness');
        Route::get('/profile/add','ProfileController@getAddBusiness');
    });

//API ROUTES
Route::group(['prefix' => '/api/v1/','middleware'=> 'api'], function () {
    Route::resource('users',Api\UsersController::class);
    Route::resource('restaurants',Api\RestaurantsController::class);
    Route::resource('vehicles',Api\VehiclesController::class);
    Route::resource('tours',Api\ToursController::class);
    Route::resource('hotels',Api\HotelsController::class);
    Route::resource('venues',Api\VenuesController::class);
});
