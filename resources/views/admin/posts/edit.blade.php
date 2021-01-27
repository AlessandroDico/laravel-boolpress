@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST"
                action="{{ route('admin.post.update', ['post'=>$post->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="title" type="text" class="form-control"placeholder="Enter Title"
                        value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subtitle</label>
                        <input name="subtitle" type="text" class="form-control" placeholder="Enter Subtitle"
                        value="{{ $post->subtitle }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">-- seleziona --</option>
                             @foreach ($categories as $category)
                                 <option value="{{ $category->id }}"
                                     {{ $category->id == $post->category_id ? "selected=selected" : '' }}>{{ $category->name }}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="text" rows="8" cols="80" placeholder="Enter Content" class="form-control">{{ $post->text }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Modify</button>
                </form>
            </div>
        </div>
    </div>
@endsection
