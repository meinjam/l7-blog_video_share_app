@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.message')
            <h1 class="text-center">All Videos</h1>
            <hr>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td>{{ $video->id }}</td>
                            <td><img src="{{ asset($video->image) }}" height="70" alt="{{ $video->title }}"></td>
                            <td><a href="{{ route('details', $video->slug) }}" target="_blank">{{ $video->title }}</a></td>
                            <td>{{ $video->created_at->format('h:i a, d M Y') }}</td>
                            <td>{{ $video->is_published ? 'Published' : 'Un-Published' }}</td>
                            <td>
                                @if ($video->is_published)
                                <a href="{{ route('unpublish.video', $video->id) }}" class="btn btn-danger btn-sm">Un-publish</a>
                                @else
                                <a href="{{ route('publish.video', $video->id) }}" class="btn btn-success btn-sm">Publish</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $videos->links() }}
        </div>
    </div>
</div>
@endsection