<?php
namespace App\Services;

use App\Carousel;
use App\Http\Requests\PostCarouselRequest;
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
    const IMAGE_LOCATION = '/public/uploads/carousel/';

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
    public function data($request,$file = 0)
    {
        if($file == 0)
        {
            return [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'position' => $request->get('position'),
            'status' => $request->get('status'),
            ];
        }
        return [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $this->fileUpload($request),
            'position' => $request->get('position'),
            'status' => $request->get('status'),
        ];

    }
    /**
     * @param PostCarouselRequest $request
     * @return mixed
     */
    public function update($id, PostCarouselRequest $request)
    {
        $carousel = Carousel::findOrFail($id);
        if($request->file('image')){
            return $carousel->update($this->data($request, 1 ));
        }
        return $carousel->update($this->data($request, 0 ));

    }

    /**
     * @param PostCarouselRequest $request
     * @return mixed
     */
  public function fileUpload($request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        // open an image file
        
        $img = Image::make($file)->resize(1024, 768);;
        // Saving the file to filesystem
        
        $img->save( base_path().self::IMAGE_LOCATION . $fileName, 80);
        
        //session()->flash('gallery.upload','Image Uploaded Sucessfully');
        return $fileName;

    }


}
