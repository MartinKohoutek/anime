<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path = '/upload')
    {
        if ($request->hasFile($inputName)) {
            $img = $request->{$inputName};
            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path($path), $imgName);
            $path = $path . '/' . $imgName;
            return $path;
        }

        return null;
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $img = $request->{$inputName};
            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path($path), $imgName);
            $path = $path . '/' . $imgName;
            return $path;
        }

        return null;
    }

    public function deleteImage(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
