<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaApiController extends Controller
{
    public function store(Request $request)
    {
        // \Illuminate\Support\Facades\Request::validate([
           $validator = Validator::make($request->all(),[
            'image' => ['required', 'mimes:jpg,png,jpeg,webp,bmp,mp4', 'max:5120'],
        ]);

        if($validator->fails()){
            return response($validator->errors());
        } 

        $path = Storage::putFile('public/media', $request->image);
        $pathArray = explode("/", $path);

        $media = new Media(['image' => $pathArray[2] ]);
        
        $album = Album::find($request->album_id);
        
        $album->medias()->save($media);


        return response("");
    }
}
