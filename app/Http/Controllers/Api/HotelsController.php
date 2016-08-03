<?php


namespace app\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Infinite\Transformers\HotelTransformer;
use App\Hotel;

/**
 * Class HotelsController
 * @package app\Http\Controllers\Api
 */
class HotelsController extends ApiController
{

    /**
     * @var HotelTransformer
     */
    protected $hotelsTransformer;


    /**
     * HotelsController constructor.
     * @param HotelTransformer $hotelTransformer
     */
    public function __construct(HotelTransformer $hotelTransformer)
    {
        return $this->hotelsTransformer = $hotelTransformer;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hotels = Hotel::with('galleries', 'contacts', 'reviews')->get();
        return $this->respond([
            'data' => $this->hotelsTransformer->transformCollection($hotels->toArray()),
            'meta-data' => str_random(0, 1)
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $hotel = Hotel::find($id)->with('contacts', 'galleries', 'reviews')->first();
        if (!$hotel) {
            return $this->respondNotFound('Hotel Does not exist');
        }

        return $this->respond([
            'data' => $this->hotelsTransformer->transform($hotel),
            'meta-data' => 'Here is some metadata'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $hotel = Hotel::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'logo' => $request->get('logo'),
        ]);

        if (!$hotel) {
            return $this->respondNotFound('Sorry Hotel couldn\'t be registered');
        }
        return $this->respond('Hotel Registered Successfully');
    }

}