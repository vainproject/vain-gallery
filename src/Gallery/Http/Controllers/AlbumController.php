<?php namespace Modules\Gallery\Http\Controllers;

use Modules\Gallery\Entities\Album;
use Vain\Http\Controllers\Controller;

class AlbumController extends Controller
{

    public function index()
    {
        return view('gallery::index');
    }

}