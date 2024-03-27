@extends('layouts.main')
@section('title', 'article')
@section('body')
    @include('layouts.index')
    <a class="btn btn-success mt-4" href="{{ route('article.Create.index') }}">Create</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">like</th>
                <th scope="col">view</th>
                <th scope="col">image</th>
                <th scope="col">action</th>
                <th scope="col">action</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($article as $articles)
                <tr>
                    <th>{{ $articles->id }}</th>
                    <td>{{ $articles->title }}</td>
                    <td>{{ $articles->like }}</td>
                    <td>{{ $articles->view }}</td>
                    <td><img style="width: 100px" src="{{ asset('storage/' . $articles->image) }}" alt=""></td>
                    <td>
                        <form action="{{ route('batafsil.index', $articles->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $articles->id }}">
                            <button type="submit" class="btn btn-primary">batafsil</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('edit.index', $articles->id) }}" class="btn btn-warning">o'zgartirish</a>
                    </td>
                    <td>
                        <form action="{{ route('article.delete', $articles->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">o'chirish</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
