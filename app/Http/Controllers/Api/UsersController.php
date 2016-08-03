<?php


namespace app\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\ApiController;
use App\Infinite\Transformers\UserTransformer;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UsersController
 * @package app\Http\Controllers\Api
 */
class UsersController extends ApiController
{
    /**
     * @var UserTransformer
     */
    protected $userTransformer;

    /**
     * UsersController constructor.
     * @param UserTransformer $userTransformer
     */
    public function __construct(UserTransformer $userTransformer)
    {
        return $this->userTransformer = $userTransformer;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();
        return $this->respond([
           'data' => $this->userTransformer->transformCollection($users->toArray()),
           'meta-data' => str_random(0,1)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);

        if( ! $user )
        {
            return $this->respondNotFound('User Does not exist');
        }
        return $this->respond([
            'data' => $this->userTransformer->transform($user),
            'meta-data' => 'Here is some metadata'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        if(! $user){
            return $this->respondNotFound('Sorry User Not Found');
        }
        return $this->respond('User Registered Successfully');
    }
}