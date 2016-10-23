<?php namespace Modules\Gallery\Http\Controllers;

use Vain\Http\Controllers\Controller;

class ImageController extends Controller
{

    public function show($slug)
    {
        return view('gallery::image.index');
    }

}