<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait VideoUploadTrait
{
    // This Version is only for Testing Videos. On Live Server delete this function 
    public function uploadVideo(Request $request, $inputName, $path = '/upload', $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            $video = $request->{$inputName};
            $videoName = $video->getClientOriginalName();
            if (!File::exists(public_path($path . '/' . $videoName))) {
                $video->move(public_path($path), $videoName);
            }
            $path = $path . '/' . $videoName;
            return $path;
        }

        return null;
    }

    // This Version is for Video Upload on Live Server; rename it on uploadVideo()
    public function uploadVideoLive(Request $request, $inputName, $path = '/upload', $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            $video = $request->{$inputName};
            $videoName = hexdec(uniqid()) . '.' . $video->getClientOriginalExtension();
            $video->move(public_path($path), $videoName);
            $path = $path . '/' . $videoName;
            return $path;
        }

        return null;
    }
}
