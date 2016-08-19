<?php
namespace App\Services;

use File;
use Image;
use App\Carousel;
use App\Http\Requests\PutCarouselRequest;
use App\Http\Requests\PostCarouselRequest;
/**
 * Class CarouselService
 * @package App\Services
 */
class CarouselService
{

    
    const IMAGE_LOCATION = '/public/uploads/carousel/';

    public function make(PostCarouselRequest $request)
    {
        if($request->hasFile('image')){
            return Carousel::create($this->data($request),1);
        } 
        return Carousel::create($this->data($request,0));
        
    }

    public function data($request, $file = 0)
    {
        if ($file == 0) {
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
    public function destroyWithResource($id)
    {
        $carousel = Carousel::findOrFail($id);

        if(File::exists($this->baseLocation($carousel->image)))
        {
            File::delete($this->baseLocation($carousel->image));
            //File::delete($this->baseLocation('th_'.$carousel->image));
        }
        $carousel = Carousel::findOrFail($id);
        return $carousel->delete();
        
    }

    /**
     * @param PostCarouselRequest $request
     *
     * @return mixed
     */
    public function update($id, PutCarouselRequest $request)
    {
        $carousel = Carousel::findOrFail($id);
        if ($request->hasFile('image')) {
            return $carousel->update($this->data($request, 1));
        }
        return $carousel->update($this->data($request, 0));

    }

    /**
     * @param PostCarouselRequest $request
     *
     * @return mixed
     */

    public function getActiveByPosition()
    {
        return Carousel::where('status','1')->orderBy('position');
    }

    public function fileUpload($request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        // open an image file
               
        $thumb = Image::make($file)->resize(100, 100);;
        // Saving the file to filesystem
        $dbFile = $this->encryptFileName($fileName,$fileExtension);
        
        $thumb->save(base_path() . self::IMAGE_LOCATION . $dbFile , 80);

        //session()->flash('gallery.upload','Image Uploaded Sucessfully');
        return $dbFile;

    }
    protected function baseLocation($fileName)
    {
        $location = base_path() . self::IMAGE_LOCATION . $fileName;
        return $location;
    }

    protected function encryptFileName($filename,$extension)
    {
        return md5($filename . microtime()).'.'.$extension;
    }


    
}
