<?php

namespace App\Http\Controllers;

use App\Post;

class FrontendController extends Controller {

    public function index() {

        $one_first = Post::orderBy( 'created_at', 'desc' )->where( 'appear_in', 1 )->where( 'is_published', 1 )->first();
        $one_four = Post::orderBy( 'created_at', 'desc' )->where( 'appear_in', 1 )->where( 'is_published', 1 )->skip( 1 )->take( 4 )->get();
        $one_all = Post::orderBy( 'created_at', 'desc' )->where( 'appear_in', 1 )->where( 'is_published', 1 )->skip( 5 )->take( 100 )->get();
        $two_first = Post::orderBy( 'created_at', 'desc' )->where( 'appear_in', 2 )->where( 'is_published', 1 )->first();
        $two_all = Post::orderBy( 'created_at', 'desc' )->where( 'appear_in', 2 )->where( 'is_published', 1 )->skip( 1 )->take( 100 )->get();
        return view( 'frontend.welcome', compact( 'one_first', 'two_first', 'one_four', 'two_all', 'one_all' ) );
    }

    public function details( $slug ) {

        $post = Post::where( 'slug', $slug )->firstOrFail();
        return view( 'frontend.details', compact( 'post' ) );
    }
}
