@extends('layouts.main')
@section('title', 'article - create')
@section('body')
    @include('layouts.index')
    <form action="{{ route('article.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <input name="content" type="text" class="form-control" id="content" placeholder="content">
        </div>
        <div class="form-group">
            <label for="sarlavha_haqida">sarlavha_haqida</label>
            <input name="sarlavha_haqida" type="text" class="form-control" id="sarlavha_haqida " autocomplete="off"
                placeholder="sarlavha_haqida">
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
