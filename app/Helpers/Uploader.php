<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Uploader
{
    static function image(UploadedFile $file, $dir): object
    {
        try {
            $filename = uniqid() . "." . $file->clientExtension();
            $filepath = "attachments/$dir/$filename";

            $path = public_path("attachments/$dir");

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($file)
                ->resize(480, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($filepath));

            return (object) [
                "status" => true,
                "message" => "",
                "data" => $filepath
            ];
        } catch (\Exception $e) {
            return (object) [
                "status" => false,
                "message" => $e->getMessage(),
                "data" => null
            ];
        }
    }

    static function photo(UploadedFile $file)
    {
        return Uploader::image($file, "photo");
    }
}
