@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-3">Section One</h2>
            <div class="row">
                <div class="col-md-6">
                    @if ($one_first)
                    <div class="relative">
                        <img src="{{ asset($one_first->image) }}" class="img-fluid mb-3" alt="">
                        @if ($one_first->type == 'video')
                        <p class="absolute"><i class="fab fa-youtube fa-3x text-white"></i></p>
                        @endif
                    </div>
                    <p><strong>Title:</strong> <a href="{{ route('details', $one_first->slug) }}">{{ substr($one_first->title, 0, 40) . ' .........' }}</a></p>
                    <p>{{ substr($one_first->description, 0, 75) . ' ................' }}</p>
                    @else
                    <h4>No Post / Video found</h4>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @if ($one_four)
                            @foreach ($one_four as $post)
                                <div class="col-md-6">
                                    <div class="relative1">
                                        <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                                        @if ($post->type == 'video')
                                        <p class="absolute1"><i class="fab fa-youtube fa-lg text-white"></i></p>
                                        @endif
                                    </div>
                                    <p><strong>Title:</strong> <a href="{{ route('details', $post->slug) }}">{{ substr($post->title, 0, 10) . ' .........' }}</a></p>
                                </div>
                            @endforeach
                        @else
                            <h5>No Post / Video found</h5> 
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($one_all)
                    @foreach ($one_all as $post)
                    <div class="col-md-3">
                        <div class="relative1">
                            <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                            <p class="absolute1"><i class="fab fa-youtube fa-lg text-white"></i></p>
                        </div>
                        <p><strong>Title:</strong> <a href="{{ route('details', $post->slug) }}">{{ substr($post->title, 0, 10) . ' .........' }}</a></p>
                    </div>
                    @endforeach
                @else
                    <h5>No Post / Video found</h5> 
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="mb-3">Section Two</h2>
            <div class="row">
                <div class="col-md-12">
                    @if ($two_first)
                    <div class="relative">
                        <img src="{{ asset($two_first->image) }}" class="img-fluid mb-3" alt="">
                        @if ($two_first->type == 'video')
                        <p class="absolute"><i class="fab fa-youtube fa-3x text-white"></i></p>
                        @endif
                    </div>
                    <p><strong>Title:</strong><a href="{{ route('details', $two_first->slug) }}">{{ substr($two_first->title, 0, 35) . ' .........' }}</a></p>
                    <p>{{ substr($two_first->description, 0, 75) . ' ................' }}</p>
                    @else
                    <h4>No Post / Video found</h4>
                    @endif
                </div>
            </div>
            <div class="row">
                @if ($two_all)
                    @foreach ($two_all as $post)
                    <div class="col-md-6">
                        <div class="relative1">
                            <img src="{{ asset($post->image) }}" class="img-fluid mb-3" alt="">
                            @if ($post->type == 'video')
                            <p class="absolute1"><i class="fab fa-youtube fa-lg text-white"></i></p>
                            @endif
                        </div>
                        <p><strong>Title:</strong> <a href="{{ route('details', $post->slug) }}">{{ substr($post->title, 0, 10) . ' .........' }}</a></p>
                    </div>
                    @endforeach
                @else
                    <h5>No Post / Video found</h5> 
                @endif
            </div>
        </div>
    </div>
</div>
@endsection