@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Title:</h1>
                <h4>- {{ $post->title }}</h4>
                <h2>Subtitle:</h2>
                <h4>- {{ $post->subtitle ? $post->subtitle : '' }}</h4>
                <h2>Category:</h2>
                <h4>- {{ $post->category ? $post->category->name : 'n.d' }}</h4>
                <h2>Tags:</h2>
                @forelse ($post->tags as $tag)
                    <h4>- {{ $tag->name }}</h4>
                @empty
                    - n.d
                @endforelse
                <h2>Post:</h2>
                <h4>{{ $post->text }}</h4>
            </div>
        </div>
    </div>
@endsection
