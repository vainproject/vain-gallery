<?php namespace Modules\Gallery\Http\Controllers;

use Vain\Http\Controllers\Controller;

class GalleryController extends Controller {
	
	public function index()
	{
		return view('gallery::index');
	}
	
}