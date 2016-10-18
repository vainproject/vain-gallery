<?php namespace Modules\Gallery\Http\Controllers;

use Modules\Gallery\Entities\Album;
use Vain\Http\Controllers\Controller;

class GalleryController extends Controller {
	
	public function index()
	{
	    dd(Album::active()->get());

		return view('gallery::index');
	}
	
}