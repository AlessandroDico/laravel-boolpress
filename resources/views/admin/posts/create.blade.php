@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.post.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="title" type="text" class="form-control"placeholder="Enter Title" value='{{ old('title') }}' required maxlength="100">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subtitle</label>
                        <input name="subtitle" type="text" class="form-control" placeholder="Enter Subtitle" maxlength="100" value='{{ old('subtitle') }}'>
                        @error('subtitle')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">-- seleziona --</option>
                             @foreach ($categories as $category)
                                 <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected=selected' : ''}}>
                                    {{ $category->name }}</option>
                             @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Select tags</p>
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                {{ in_array($tag->id, old('tags', [])) ? 'checked=checked' : '' }}>
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="text" rows="8" cols="80" placeholder="Enter Content" class="form-control" required>{{ old('text') }}</textarea>
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
