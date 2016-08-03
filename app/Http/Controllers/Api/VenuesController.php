<?php


namespace app\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Infinite\Transformers\VenueTransformer;
use App\Venue;

/**
 * Class VenuesController
 * @package app\Http\Controllers\Api
 */
class VenuesController extends ApiController
{

    /**
     * @var VenueTransformer
     */
    protected $venuesTransformer;


    /**
     * VenuesController constructor.
     * @param VenueTransformer $venueTransformer
     */
    public function __construct(VenueTransformer $venueTransformer)
    {
        return $this->venuesTransformer = $venueTransformer;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $venues = Venue::with('contacts','galleries','reviews')->get();
        return $this->respond([
            'data' => $this->venuesTransformer->transformCollection($venues->toArray()),
            'meta-data' => str_random(0,1)
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $venue = Venue::find($id)->with('contacts','galleries','reviews')->first();

        if( ! $venue )
        {
            return $this->respondNotFound('Venue Does not exist');
        }
        return $this->respond([
            'data' => $this->venuesTransformer->transform($venue),
            'meta-data' => 'Here is some metadata'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $venue = Venue::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'logo' => $request->get('logo'),
        ]);

        if(! $venue){
            return $this->respondNotFound('Sorry Venue couldn\'t be registered');
        }
        return $this->respond('Venue Registered Successfully');
    }

}