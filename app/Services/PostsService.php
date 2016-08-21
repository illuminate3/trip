<?php
namespace App\Services;

use App\Http\Requests\PostHotelRequest;
use App\Post;
use Auth;
use Image;

/**
 * Class HotelsService
 * @package App\Services
 */
class PostsService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/posts/';

    /**
     * @param PostHotelRequest $request
     *
     * @return bool
     */
    public function make(PostHotelRequest $request)
    {
        $hotel = new Post();
        $hotel->title = $request->get('title');
        $hotel->content = $request->get('description');
        if ($request->get('image')) {
            $hotel->image = $this->fileUpload($request);
        }
        $hotel->user_id = Auth::user()->id;
        return $hotel->save();
    }

    /**
     * @param $request
     * @param $id
     *
     * @return mixed
     */
    public function update($request, $id)
    {

        $hotel = Post::findOrFail($id);
        $hotel->title = $request->get('title');
        $hotel->content = $request->get('description');
        if ($request->get('image')) {
            $hotel->image = $this->fileUpload($request);
        }
        $hotel->user_id = Auth::user()->id;
        return $hotel->save();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function approve($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->status = 1;
        return $hotel->save();
    }

    /**
     * @param PostHotelRequest $request
     *
     * @return mixed
     */
    public function fileUpload($request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        // open an image file
        $img = Image::make($file)->resize(350, 200);;
        // Saving the file to filesystem
        $img->save(base_path() . self::IMAGE_LOCATION . $fileName, 80);
        return $fileName;
    }
}
