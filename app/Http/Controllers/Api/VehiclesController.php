<?php


namespace app\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Infinite\Transformers\VehicleTransformer;
use App\Vehicle;

/**
 * Class VehiclesController
 * @package app\Http\Controllers\Api
 */
class VehiclesController extends ApiController
{

    /**
     * @var VehicleTransformer
     */
    protected $vehiclesTransformer;


    /**
     * VehiclesController constructor.
     * @param VehicleTransformer $vehicleTransformer
     */
    public function __construct(VehicleTransformer $vehicleTransformer)
    {
        return $this->vehiclesTransformer = $vehicleTransformer;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $vehicles = Vehicle::with('contacts','galleries','reviews')->get();
        return $this->respond([
            'data' => $this->vehiclesTransformer->transformCollection($vehicles->toArray()),
            'meta-data' => str_random(0,1)
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id)->with('contacts','galleries','reviews')->first();

        if( ! $vehicle )
        {
            return $this->respondNotFound('Vehicle Does not exist');
        }
        return $this->respond([
            'data' => $this->vehiclesTransformer->transform($vehicle),
            'meta-data' => 'Here is some metadata'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'logo' => $request->get('logo'),
        ]);

        if(! $vehicle){
            return $this->respondNotFound('Sorry Vehicle couldn\'t be registered');
        }
        return $this->respond('Vehicle Registered Successfully');
    }

}