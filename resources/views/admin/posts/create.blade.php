@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('admin.post.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="title" type="text" class="form-control"placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subtitle</label>
                        <input name="subtitle" type="text" class="form-control" placeholder="Enter Subtitle">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="text" rows="8" cols="80" placeholder="Enter Content" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
