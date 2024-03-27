@extends('layouts.main')
@section('title', 'article - edit')
@section('body')
    @include('layouts.index')

    <form action="{{ route('article.edit', $article->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" autocomplete="off"
                value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input name="content" type="text" class="form-control" id="exampleInputPassword1" id="content"
                autocomplete="off" value="{{ $article->content }}">
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <img class="mt-5" style="width:500px" src="{{ asset('storage/' . $article->image) }}" alt="">
       <input name="image" type="file" class="form-control" id="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">o'zgartir</button>
    </form>
@endsection
