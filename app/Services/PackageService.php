<?php


namespace App\Services;

use App\Http\Requests\PostPackageRequest;
use App\Http\Requests\PutPackageRequest;
use App\Package;
use App\Tour;
use Image;

/**
 * Class PackageService
 * @package App\Services
 */
class PackageService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/tour/packages/';


    /**
     * @param $id
     * @param PostPackageRequest $request
     *
     * @return mixed
     */
    public function make($id, PostPackageRequest $request)
    {
        $restaurant = Tour::findOrFail($id);
        $restaurant->packages->create($this->data($request));
        return $restaurant->save();


    }

    /**
     * @param $id
     * @param PostPackageRequest $request
     *
     * @return mixed
     */
    public function update($id, PutPackageRequest $request)
    {
        $package = Package::findOrFail($id);
        $packages->update($id, $this->data($request));
        return $restaurant->save();

    }


    /**
     * @param $request
     *
     * @return null|string
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


    /**
     * @param PostPackageRequest $request
     *
     * @return array
     */
    protected function data($request)
    {
        return [
            'name' => $request->get('name'),
            'image' => $this->fileUpload($request),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'price' => $request->get('price'),
            'duration' => $request->get('duration'),
            'difficulty' => $request->get('difficulty'),
            'best_season' => $request->get('best-season')
        ];
    }
}
