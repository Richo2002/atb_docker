<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function home() {
        $articles = Article::orderByDesc('id')->get();
        return Inertia::render('Home', [
            'articles' => $articles,
        ]);
    }

    public function domain() {
        return Inertia::render('Domain');
    }

    public function aboutUs() {
        return Inertia::render('AboutUs');
    }

    public function newsletter(Request $request) {

        $newsletter = Newsletter::find($request->email);

        if($newsletter==null){
            Newsletter::create([
                'email' => $request->email,
            ]);
        }

        return redirect()->route('home');
    }
}
