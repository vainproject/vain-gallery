<?php namespace Modules\Gallery\Http\Controllers;

use Modules\Gallery\Entities\Album;
use Vain\Http\Controllers\Controller;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::with('content')->active()->paginate(9);

        return view('gallery::album.index')->with('albums', $albums);
    }

    public function show($slug)
    {
        $album = Album::with('content', 'images')
            ->active()
            ->where('slug', $slug)
            ->first();

        if ($album === null) {
            app()->abort(404, 'album with slug \'' . $slug . '\' not found');
        }

        //$this->authorize('show', $album);

        return view('gallery::album.show')->with('album', $album);
    }
}