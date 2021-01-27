@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="post-header-title col-6">
                <h1>
                    All posts
                </h1>
            </div>
            <div class="post-header-button col-6 d-flex flex-row-reverse">
                <a href="{{ route('admin.post.create') }}">
                    <button type="button" class="btn btn-success">Add new Post +</button>
                </a>
            </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.post.show', ['post'=>$post->id ]) }}">
                                        <button class="btn btn-primary">Show</button>
                                    </a>
                                    <a href="{{ route('admin.post.edit', ['post'=>$post->id ]) }}">
                                        <button class="btn btn-info">Modify</button>
                                    </a>
                                    <form class="d-inline"
                                    action="{{ route('admin.post.destroy', ['post'=>$post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
