<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Album;
use App\Models\Article;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AlbumNewsController extends Controller
{

    public function create($id)
    {
        $album = Album::findOrFail($id);
            return inertia("NewNews", [
                'album' => $album,
            ]);
    }

    public function store(Request $request, $album)
    {
        \Illuminate\Support\Facades\Request::validate([
            'title' => ['max:50'],
            'description' => ['required', 'min:50'],
            'image' => ['required', 'image', 'max:512'],
        ]);

        $album = Album::find($album);

        $path = Storage::putFile('public/articles', $request->image);
        $pathArray = explode("/", $path);

        $article = $album->articles()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $pathArray[2],
        ]);

        $receivers = Newsletter::all();
        foreach ($receivers as $receiver) {
            Mail::to($receiver)->send(new NewsletterMail($article));
        }

        return Redirect::route('actualites.index');
    }
}
