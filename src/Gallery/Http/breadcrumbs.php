<?php

use Modules\Gallery\Entities\Album;
use Modules\Gallery\Entities\Image;

/*
 * Public Area
 */

Breadcrumbs::register('gallery.album.index', function ($breadcrumbs) {
    $breadcrumbs->parent('index.home');
    $breadcrumbs->push(trans('gallery::album.title.index'), route('gallery.album.index'));
});

Breadcrumbs::register('gallery.album.show', function ($breadcrumbs, $slug) {
    $album = Album::where('slug', $slug)->first();
    $breadcrumbs->parent('gallery.album.index');
    $breadcrumbs->push($album->content->title, route('gallery.album.show', $slug));
});

/*
 * Admin-Area
 */

Breadcrumbs::register('gallery.admin.images.index', function ($breadcrumbs) {
    $breadcrumbs->push(trans('gallery::admin.title.images'), route('gallery.admin.images.index'));
});

Breadcrumbs::register('gallery.admin.images.edit', function ($breadcrumbs, $id) {
    $image = Image::find($id);
    $breadcrumbs->parent('gallery.admin.images.index');
    $breadcrumbs->push($image->content->title, route('gallery.admin.images.edit', $id));
});

Breadcrumbs::register('gallery.admin.images.create', function ($breadcrumbs) {
    $breadcrumbs->parent('gallery.admin.images.index');
    $breadcrumbs->push(trans('gallery::admin.images.title.create'), route('gallery.admin.images.create'));
});

Breadcrumbs::register('gallery.admin.albums.index', function ($breadcrumbs) {
    $breadcrumbs->push(trans('gallery::admin.title.albums'), route('gallery.admin.albums.index'));
});

Breadcrumbs::register('gallery.admin.albums.edit', function ($breadcrumbs, $id) {
    $album = Album::find($id);
    $breadcrumbs->parent('gallery.admin.albums.index');
    $breadcrumbs->push($album->content->title, route('gallery.admin.albums.edit', $id));
});

Breadcrumbs::register('gallery.admin.albums.create', function ($breadcrumbs) {
    $breadcrumbs->parent('gallery.admin.albums.index');
    $breadcrumbs->push(trans('gallery::admin.albums.title.create'), route('gallery.admin.albums.create'));
});
