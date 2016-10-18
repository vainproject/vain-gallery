<?php

Route::group(['prefix' => 'gallery'], function () {
    Route::get('/', [
        'uses' => 'AlbumController@index',
        'as'   => 'gallery.album.index',
    ]);

    Route::get('{slug}', [
        'uses' => 'AlbumController@show',
        'as'   => 'gallery.album.show',
    ]);

    Route::group(['prefix' => 'image'], function () {

        Route::get('{slug}', [
            'uses' => 'ImageController@show',
            'as'   => 'gallery.image.show',
        ]);
    });
});

/*
 * Backend
 */
Route::group(['prefix' => 'admin/gallery', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('images', 'ImageController', ['names' => [
        'index'   => 'gallery.admin.images.index',
        'create'  => 'gallery.admin.images.create',
        'store'   => 'gallery.admin.images.store',
        'show'    => 'gallery.admin.images.show',
        'edit'    => 'gallery.admin.images.edit',
        'update'  => 'gallery.admin.images.update',
        'destroy' => 'gallery.admin.images.destroy',
    ]]);

    Route::resource('albums', 'AlbumController', ['names' => [
        'index'   => 'gallery.admin.albums.index',
        'create'  => 'gallery.admin.albums.create',
        'store'   => 'gallery.admin.albums.store',
        'show'    => 'gallery.admin.albums.show',
        'edit'    => 'gallery.admin.albums.edit',
        'update'  => 'gallery.admin.albums.update',
        'destroy' => 'gallery.admin.albums.destroy',
    ]]);
});
