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

    public function store(Requests\PostReviewRequest $request)
    {
        if ($this->createReviews->make($request)) {
            session()->flash('sucMsg', 'Review made!');
            return redirect()->back();
        }
        session()->flash('errMsg', 'Error while posting review!');
        return redirect()->back();

    }


    public function update(Request $request, $id)
    {
        if($this->createReviews->update($request,$id))
        {
            session()->flash('sucMsg','Review Updated');
            return redirect()->back();
        }
        session()->flash('errMsg','Error while updating your review');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->createReviews->destroy($id))
        {
            session()->flash('sucMsg','Review deleted');
            return redirect()->back();
        }
        session()->flash('errMsg','Review couldn\'t be deleted');
        return redirect()->back();
    }
}
