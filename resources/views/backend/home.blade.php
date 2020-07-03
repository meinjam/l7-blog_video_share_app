@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Welcome {{ Auth::User()->name }}</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('posts') }}" class="btn btn-primary btn-block mb-3">All Posts</a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('videos') }}" class="btn btn-success btn-block mb-3">All Videos</a>
                </div>
            </div>
            @include('layouts.message')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li >{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card">
                <div class="card-header"><h2>Create new Post/Video</h2></div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- Title --}}
                        <div class="form-group">
                            <label for="title">Enter Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group">
                            <label for="image">Enter Picture</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                                <label class="custom-file-label" for="image">Choose file...</label>
                            </div>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Enter Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                rows="5" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Appear --}}
                        <div class="form-group">
                            <label for="appear">Select where this post will appear</label>
                            <select name="appear_in" id="appear" class="form-control">
                                <option value="1">Section One</option>
                                <option value="2">Section Two</option>
                            </select>
                        </div>

                        {{-- Type --}}
                        <div class="form-group">
                            <label for="type">Select type Post or Video</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1">Post</option>
                                <option value="2">Video</option>
                            </select>
                        </div>

                        {{-- Url --}}
                        <div class="form-group">
                            <label for="url">Enter Youtube Url</label>
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autocomplete="url" autofocus>
                            <small>Enter url like: <strong>https://www.youtube.com/watch?v=K4DyBUG242c</strong>. Not https://www.youtube.com/watch?v=Q-ZZ8y378JU&t=165s or https://youtu.be/Q-ZZ8y378JU or other playlist url.</small>
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
