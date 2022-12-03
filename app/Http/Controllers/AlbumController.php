<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = DB::table('albums')
                    ->select('albums.id')
                    ->groupBy('albums.id')
                    ->join('media', 'albums.id', '=', 'media.album_id')
                    ->select('albums.id as id', 'albums.title as title', 'media.image as lastImage', 'media.id as media_id')
                    ->paginate(8);

        return inertia('Gallery', [
            'albums' => $albums,
        ]);
    }

    public function create()
    {
        return inertia("NewAlbum");
    }

    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Request::validate([
                'title' => ['required', 'max:50'],
                'media' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if (count($value) < 4) {
                            $fail('Vous devriez importer au moins 4 '.$attribute.'.');
                        } else if(count($value)> 10) {
                            $fail('Vous devriez importer au plus 15 '.$attribute.'.');
                        }
                    },
                ],
                'media.*' => ['required','mimes:jpg,png,jpeg,webp,bmp,mp4', 'max:4096'],
        ]);

        $album = Album::create([
            'title' => $request->title
        ]);

        foreach($request->media as $media) {
            $path = Storage::putFile('public/media', $media);
            $pathArray = explode("/", $path);

            $album->medias()->create([
                'image' => $pathArray[2]
            ]);
        }

        return Redirect::route('albums.index');
    }

    public function show($id)
    {
        $album = DB::table('albums')
                            ->select('title', 'id')
                            ->where('id', '=', $id)
                            ->get();

        $medias = Media::where('album_id', $id)
                            ->orderByDesc('id')
                            ->get();

        return inertia("AlbumAdmin", [
            'album' => $album,
            'medias' => $medias,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        
        foreach($album->medias as $media) {
            Storage::delete('public/media/'.$media->image);
        }
        
        $album->delete();

        return Redirect::route('albums.index');
    }
}
