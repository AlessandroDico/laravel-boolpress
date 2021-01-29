@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Title:</h1>
                <h4>- {{ $post->title }}</h4>
                <h2>Subtitle:</h2>
                <h4>- {{ $post->subtitle ? $post->subtitle : '' }}</h4>
                <h2>Category:</h2>
                <h4>-
                    @if ($post->category)
                        <a href="{{ route('category.show', ['slug'=>$post->category->slug]) }}">
                            {{ $post->category->name }}
                        </a>
                    @else
                        n.d
                    @endif
                </h4>
                <h2>Tags:</h2>
                <h4>
                    @forelse ($post->tags as $tag)
                        <p>- {{ $tag->name }}</p>
                    @empty
                        n.d
                    @endforelse
                </h4>
                <h2>Post:</h2>
                <h4>{{ $post->text }}</h4>
            </div>
        </div>
    </div>
@endsection
