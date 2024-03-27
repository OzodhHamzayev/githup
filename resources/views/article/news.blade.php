@extends('layouts.main')


@section('title', 'article - show')


@section('body')
    @include('layouts.index')

    <div class="row">
        @foreach ($article as $articles)
            <div class="card container mt-4 col-4" style="width: 600px; ">
                <h1>{{ $articles->title }}</h1><br><br><br>
                <div>
                    <img style="width:35px" src="{{ $articles->user->image_email }}" alt="">
                    {{ $articles->user->email }}
                </div>
                <img class="card-img-top mt-3" src="{{ $articles->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $articles->content }}</h5>
                    <p class="card-text">{{ $articles->sarlavha_haqida }}</p>
                </div>
                <form action="{{ route('article.news.show', $articles->id) }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">batafsil</button>
                </form>
            </div>
        @endforeach
    </div>

@endsection
