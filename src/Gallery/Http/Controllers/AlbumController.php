<?php namespace Modules\Gallery\Http\Controllers;

use Modules\Gallery\Entities\Album;
use Vain\Http\Controllers\Controller;

class AlbumController extends Controller
{

    public function index()
    {
        return view('gallery::album.index');
    }

    public function show($slug)
    {
        $album = Album::active()
            ->where('slug', $slug)
            ->first();

        if ($album === null) {
            app()->abort(404, 'album with slug \'' . $slug . '\' not found');
        }

        //$this->authorize('show', $album);

        return view('gallery::album.show')->with('album', $album);
    }
}