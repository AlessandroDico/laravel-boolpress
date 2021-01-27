@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>All posts</h1>
                <ul>
                    @foreach ($posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
