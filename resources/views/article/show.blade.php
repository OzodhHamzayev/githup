@extends('layouts.main')


@section('title', 'article - show')

@section('body')
    @include('layouts.index')

    <div class="card container" style="width: 700px;">
        <h1>{{ $article->title }}</h1>
        <div>
            <img style="width:35px" src="{{ $article->user->image_email }}" alt="">
            {{ $article->user->email }}
        </div>
        <img class="card-img-top mt-3" src="{{ $article->image }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $article->content }}</h5>
            <p class="card-text">{{ $article->sarlavha_haqida }}</p>
            <div>
                <div>
                    {{ $views }}
                    <i class="bi bi-eye"></i>
                </div>
                <br>
                <div style="display: flex">
                    <form action="{{ route('response_type') }}" method="post">
                        @csrf
                        <input name="post_id" type="hidden" value="{{ $article->id }}">
                        <input name="response_type" type="hidden" value="likes">
                        <button><i class="bi bi-hand-thumbs-up"></i></button>
                    </form>
                    <div class="mr-1 ml-1 mb-5">
                        {{ $likes }}
                    </div>
                    <form action="{{ route('response_type') }}" method="post">
                        @csrf
                        <input name="post_id" type="hidden" value="{{ $article->id }}">
                        <input name="response_type" type="hidden" value="dislikes">
                        <button><i class="bi bi-hand-thumbs-down"></i></button>
                    </form>
                    <div>
                        {{ $dislikes }}

                    </div>
                </div>
            </div>
            <div>

            </div>
            <div>
                @foreach ($comment as $comments)
                    <div class="container  text-dark ">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 col-lg-3 col-xl-12">
                                <div class="d-flex flex-start mb-4">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{ $comments->user->image_email }}" alt="avatar" width="55"
                                        height="55" />
                                    <div class="card w-100">
                                        <div class="card-body p-4">
                                            <div class="">
                                                <h5>{{ $comments->user->email }}</h5>
                                                <p class="small">{{ $article->created_at }}</p>
                                                <p>
                                                    {{ $comments->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>

                <form action="{{ route('article.comment') }}" method="post">
                    @csrf
                    <label for="comment">comment</label>
                    <input type="text" name="comment" id="comment" placeholder="comment" autocomplete="off">
                    <input type="hidden" value="{{ $article->id }}" name="article_id" id="article_id">


                    <button type="submit" class="btn btn-primary mr-4">comment</button>
                </form>

            </div>
        </div>
    </div>

@endsection
