@extends('layouts.main')


@section('title', 'article - show')


@section('body')
    @include('layouts.index')


    <div class="container" style="width: 700px;">
        <h1>{{ $article->title }}</h1>
        <div>
            <img style="width:35px" src="{{ $article->user->image_email }}" alt="">
            {{ $article->user->email }}
        </div>
        <img class="card-img-top mt-3" src="{{ $article->image }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $article->content }}</h5>
            <p class="card-text">{{ $article->sarlavha_haqida }}</p>
        </div>
        <div>
            <i class="bi bi-hand-thumbs-up-fill"></i>
            @if ($article->like > 99999 && $article->like < 100000)K
                {{ round($article->like / 1000) }}K
            @elseif($article->like >= 100000)
                {{ round($article->like / 1000000) }}K
            @else
                {{ $article->like }}
                <i class="bi bi-eye-fill"></i>
        </div>
        <a class="btn btn-primary" href="{{ route('article.news') }}">ortga</a>
    </div>

@endsection
