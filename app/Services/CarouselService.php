<?php
namespace App\Services;

use App\Carousel;
use App\Http\Request\PostCarouselRequest;
use Image;

/**
 * Class CarouselService
 * @package App\Services
 */
class CarouselService
{

    /**
     *
     */
    const IMAGE_LOCATION = 'public/uploads/carousel/';

    /**
     * @param PostCarouselRequest $request
     * @return mixed
     */
    public function make(PostCarouselRequest $request)
    {
        $image = $this->fileUpload($request);
        $carousel = Carousel::create($request->all());
        return $carousel;

    }
    /**
     * @param PostCarouselRequest $request
     * @return mixed
     */
    public function update($id, PostCarouselRequest $request)
    {
        $carousel = Carousel::findOrFail($id);
        $image = $this->fileUpload($request);
        $carousel = Carousel::create($request->all());
        return $carousel;

    }

    /**
     * @param PostCarouselRequest $request
     * @return mixed
     */
    protected function fileUpload(PostCarouselRequest $request)
    {
        $file = $request->file('image')->getClientOriginalName();
        $img = Image::make($file);

        // Resize Image
        $img->resize(1366, 768);

        // Saving the file to filesystem
        $img->save(self::IMAGE_LOCATION . $file);
        return $file;
    }

}
