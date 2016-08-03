<?php


namespace app\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Infinite\Transformers\RestaurantTransformer;
use App\Restaurant;

/**
 * Class RestaurantsController
 * @package app\Http\Controllers\Api
 */
class RestaurantsController extends ApiController
{

    /**
     * @var RestaurantTransformer
     */
    protected $restaurantsTransformer;


    /**
     * RestaurantsController constructor.
     * @param RestaurantTransformer $restaurantTransformer
     */
    public function __construct(RestaurantTransformer $restaurantTransformer)
    {
        return $this->restaurantsTransformer = $restaurantTransformer;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $restaurants = Restaurant::with('contacts','galleries','reviews')->get();
        return $this->respond([
            'data' => $this->restaurantsTransformer->transformCollection($restaurants->toArray()),
            'meta-data' => str_random(0,1)
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id)->with('galleries','contacts','reviews')->first();

        if( ! $restaurant )
        {
            return $this->respondNotFound('Restaurant Does not exist');
        }
        return $this->respond([
            'data' => $this->restaurantsTransformer->transform($restaurant),
            'meta-data' => 'Here is some metadata'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $restaurant = Restaurant::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'logo' => $request->get('logo'),
        ]);

        if(! $restaurant){
            return $this->respondNotFound('Sorry Restaurant couldn\'t be registered');
        }
        return $this->respond('Restaurant Registered Successfully');
    }

}