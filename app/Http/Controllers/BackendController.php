<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendController extends Controller {

    public function __construct() {

        $this->middleware( 'auth' );
    }

    public function posts() {

        $posts = Post::where( 'type', 'post' )->latest()->paginate( 10 );
        return view( 'backend.posts', compact( 'posts' ) );
    }

    public function videos() {

        $videos = Post::where( 'type', 'video' )->latest()->paginate( 10 );
        return view( 'backend.videos', compact( 'videos' ) );
    }

    public function unpublish_post( $id ) {

        $post = Post::findOrFail( $id );
        $post->is_published = 0;
        $post->save();
        return redirect()->back()->with( 'success', 'Post Un-published Successfully.' );
    }

    public function publish_post( $id ) {

        $post = Post::findOrFail( $id );
        $post->is_published = 1;
        $post->save();
        return redirect()->back()->with( 'success', 'Post Published Successfully.' );
    }

    public function unpublish_video( $id ) {

        $video = Post::findOrFail( $id );
        $video->is_published = 0;
        $video->save();
        return redirect()->back()->with( 'success', 'Video Un-published Successfully.' );
    }

    public function publish_video( $id ) {

        $video = Post::findOrFail( $id );
        $video->is_published = 1;
        $video->save();
        return redirect()->back()->with( 'success', 'Video Published Successfully.' );
    }

    public function store( Request $request ) {

        $type = $request->type;

        if ( $type == 1 ) {

            $rules = [
                'title'       => 'required|min:6|max:255|unique:posts',
                'description' => 'required',
                'image'       => 'required|image|max:5000',
                'appear_in'   => 'required',
                'type'        => 'required',
            ];

            $this->validate( $request, $rules );

            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = Str::slug( $request->title );
            $post->appear_in = $request->appear_in;
            $post->type = 'post';

            $image = $request->file( 'image' );
            $imageName = 'post_img-' . time() . Str::random( 15 );
            $extension = strtolower( $image->getClientOriginalExtension() );
            $imageFullName = $imageName . '.' . $extension;
            $uploadPath = 'img/post/';
            $imageURL = $uploadPath . $imageFullName;
            $success = $image->move( $uploadPath, $imageFullName );
            $post['image'] = $imageURL;

            $post->save();
            return redirect()->back()->with( 'success', 'Post Added Successfully.' );

        } else {

            $rules = [
                'title'       => 'required|min:6|max:255|unique:posts',
                'description' => 'required',
                'image'       => 'required|image|max:5000',
                'appear_in'   => 'required',
                'url'         => 'required',
            ];

            $this->validate( $request, $rules );

            $url = $request->url;
            $insertUrl = substr(strrchr($url, '='), 1);

            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = Str::slug( $request->title );
            $post->url = $insertUrl;
            $post->appear_in = $request->appear_in;
            $post->type = 'video';

            $image = $request->file( 'image' );
            $imageName = 'video_img-' . time() . Str::random( 15 );
            $extension = strtolower( $image->getClientOriginalExtension() );
            $imageFullName = $imageName . '.' . $extension;
            $uploadPath = 'img/video/';
            $imageURL = $uploadPath . $imageFullName;
            $success = $image->move( $uploadPath, $imageFullName );
            $post['image'] = $imageURL;

            $post->save();
            return redirect()->back()->with( 'success', 'Video Added Successfully.' );
        }
    }
}
