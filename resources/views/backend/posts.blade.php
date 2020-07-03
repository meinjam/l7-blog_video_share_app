@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.message')
            <h1 class="text-center">All Posts</h1>
            <hr>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ asset($post->image) }}" height="70" alt="{{ $post->title }}"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('h:i a, d M Y') }}</td>
                            <td>{{ $post->is_published ? 'Published' : 'Un-Published' }}</td>
                            <td>
                                @if ($post->is_published)
                                <a href="{{ route('unpublish.post', $post->id) }}" class="btn btn-danger btn-sm">Un-publish</a>
                                @else
                                <a href="{{ route('publish.post', $post->id) }}" class="btn btn-success btn-sm">Publish</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection