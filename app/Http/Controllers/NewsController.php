<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Article;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('id')->paginate(5);

        return inertia("News", [
            'articles' => $articles,
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        $medias = Media::where('album_id', $article->album_id)
                        ->orderByDesc('id')
                        ->get();

        return inertia('OneNews', [
            'article' => $article,
            'medias' => $medias,
        ]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return inertia("NewNews", [
            'article' => $article,
        ]);
    }

    public function update(Request $request, $id)
    {
        \Illuminate\Support\Facades\Request::validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'min:50'],
        ]);

        $article = Article::findOrFail($id);

        if ( ! Storage::exists('public/articles/'.$request->image)) {

            \Illuminate\Support\Facades\Request::validate([
                'image' => ['required', 'image', 'max:512'],
            ]);

            Storage::delete('public/articles'.$article->image);

            $path = Storage::putFile('public/articles', $request->image);
            $pathArray = explode("/", $path);

            $article->image = $pathArray[2];
        }
        $article->title = $request->title;
        $article->description = $request->description;

        $article->save();

        return Redirect::route('actualites.index');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        Storage::delete('public/articles/'.$article->image);
        
        $article->delete();

        return Redirect::route('actualites.index');
    }
}
