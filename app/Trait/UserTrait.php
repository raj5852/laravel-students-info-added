<?php

namespace App\Trait;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait UserTrait
{

    function fileUpload($file, $path, $withd = 300, $height = 240)
    {
        $image_name = uniqid() . '.' . $file->getClientOriginalExtension();
        $category_image = $path . '/' . $image_name;
        Image::make($file)->resize($withd, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($category_image));

        return $category_image;
    }

    function fileDelete($filePath)
    {
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}
