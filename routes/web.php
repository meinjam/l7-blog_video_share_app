<?php

use Illuminate\Support\Facades\Route;

Route::get( '/', 'FrontendController@index' )->name( 'homepage' );
Route::get( '/details/{slug}', 'FrontendController@details' )->name( 'details' );

Auth::routes();

Route::get( '/admin', 'HomeController@index' )->name( 'home' );
Route::post( '/store', 'BackendController@store' )->name( 'store' );
Route::get( '/admin/posts', 'BackendController@posts' )->name( 'posts' );
Route::get( '/admin/post/{id}/un-publish', 'BackendController@unpublish_post' )->name( 'unpublish.post' );
Route::get( '/admin/post/{id}/publish', 'BackendController@publish_post' )->name( 'publish.post' );
Route::get( '/admin/videos', 'BackendController@videos' )->name( 'videos' );
Route::get( '/admin/video/{id}/un-publish', 'BackendController@unpublish_video' )->name( 'unpublish.video' );
Route::get( '/admin/video/{id}/publish', 'BackendController@publish_video' )->name( 'publish.video' );
