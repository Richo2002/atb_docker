<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        
        $nbr_media = DB::table('media')
                        ->selectRaw('count(*) as nbr_media')
                        ->where('album_id', '=', $media->album_id)
                        ->first();

        Storage::delete('public/media/'.$media->image);
        
        if($nbr_media->nbr_media > 1) {
            $media->delete();
            return Redirect::route('albums.show',$media->album_id);
        }
        else {
            $album = Album::findOrFail($media->album_id);
            $album->delete();
            return Redirect::route('albums.index');
        }
    }
}
