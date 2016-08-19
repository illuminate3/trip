<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Review;
use App\Services\ReviewsService;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    protected $createReviews;

    /**
     * ReviewsController constructor.
     *
     * @param $createReviews
     */
    public function __construct(ReviewsService $createReviews)
    {
        $this->createReviews = $createReviews;

    }


    public function index(Review $review)
    {
        $reviews = $review->all();
        dd($reviews);
    }


    public function create()
    {
        //
    }


    public function store(Requests\PostReviewRequest $request)
    {
        if ($this->createReviews->make($request)) {
            return back()->with(['success' => 'Congratulations!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
