@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($post->type == 'video')
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{'https://www.youtube.com/embed/' . $post->url . '?rel=0'}}" allowfullscreen></iframe>
                </div>
            @else
                <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
            @endif
            <h2 class="mt-3">{{ $post->title }}</h2>
            <p><i class="far fa-clock"></i> {{ $post->created_at->format('h:i a, d M Y') }}</p>
            <p>{{ $post->description }}</p>
        </div>
    </div>
</div>
@endsection