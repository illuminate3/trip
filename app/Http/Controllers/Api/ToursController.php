<?php


namespace app\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Infinite\Transformers\TourTransformer;
use App\Tour;

/**
 * Class ToursController
 * @package app\Http\Controllers\Api
 */
class ToursController extends ApiController
{

    /**
     * @var TourTransformer
     */
    protected $toursTransformer;


    /**
     * ToursController constructor.
     * @param TourTransformer $tourTransformer
     */
    public function __construct(TourTransformer $tourTransformer)
    {
        return $this->toursTransformer = $tourTransformer;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tours = Tour::with('galleries','contacts','reviews')->get();
        return $this->respond([
            'data' => $this->toursTransformer->transformCollection($tours->toArray()),
            'meta-data' => str_random(0,1)
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $tour = Tour::find($id)->with('contacts','galleries','reviews','packages');


        if( ! $tour )
        {
            return $this->respondNotFound('Tour Does not exist');
        }
        return $this->respond([
            'data' => $this->toursTransformer->transform($tour),
            'meta-data' => 'Here is some metadata'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $tour = Tour::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'logo' => $request->get('logo'),
        ]);

        if(! $tour){
            return $this->respondNotFound('Sorry Tour couldn\'t be registered');
        }
        return $this->respond('Tour Registered Successfully');
    }

}