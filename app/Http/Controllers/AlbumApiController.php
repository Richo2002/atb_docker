<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlbumApiController extends Controller
{
    public function show($id)
    {
        $album = Album::findOrFail($id);

        return new AlbumResource($album);
    }
}
