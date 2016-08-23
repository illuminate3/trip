<?php

namespace App\Services;


use App\Hotel;
use App\Http\Requests\PostReviewRequest;
use App\Restaurant;
use App\Review;
use App\Tour;
use App\Vehicle;
use App\Venue;
use Auth;

/**
 * Class CreateReviewsService
 * @package App\Services
 */
class ReviewsService
{
    /**
     * @param PostReviewRequest $request
     *
     * @return mixed
     */
    public function make(PostReviewRequest $request)
    {
        $reviews = [
            'rating' => $request->get('rating'),
            'review' => $request->get('review'),
            'user_id' => Auth::user()->id ?? 0,
            'reviewable_id' => $request->get('review_id'),
            'reviewable_type' => $request->get('review_model')
        ];

        return $this->checkModel($request, $reviews);
    }

    /**
     * @param PostReviewRequest $request
     *
     * @return mixed
     */
    public function update(PostReviewRequest $request)
    {
        $authId = \Auth::check() ? \Auth::userId() : 1;

        $reviews = [
            'rating' => $request->get('rating'),
            'review' => $request->get('review'),
            'user_id' => $authId,
            'reviewable_id' => $request->get('review_id'),
            'reviewable_type' => $request->get('review_model')
        ];

        return $this->checkModel($request, $reviews);
    }

    /**
     * @param PostReviewRequest $request
     * @param Array $reviews
     *
     * @return mixed
     */
    public function checkModel(PostReviewRequest $request, $reviews)
    {
        switch ($request->get('review_model')) {
            case "Restaurant":
                $review = Restaurant::find($request->get('review_id'));
                return $review->reviews()->create($reviews);
                break;
            case "Hotel":
                $review = Hotel::find($request->get('review_id'));
                return $review->reviews()->create($reviews);
                break;
            case "Venue":
                $review = Venue::find($request->get('review_id'));
                return $review->reviews()->create($reviews);
                break;
            case "Tour":
                $review = Tour::find($request->get('review_id'));
                return $review->reviews()->create($reviews);
                break;
            case "Vehicle":
                $review = Vehicle::find($request->get('review_id'));
                return $review->reviews()->create($reviews);
                break;
            default:
                return back()->with(['error' => 'No correct model can be found to insert ']);
                break;

        }
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        return $review->delete();
    }
}
