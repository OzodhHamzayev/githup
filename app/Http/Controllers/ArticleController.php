<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\EditUpdateRequest;
use App\Http\Requests\ViewRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Dislikes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Like;
use App\Models\View;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::query()->get();
        return view('article.index', [
            'article' => $article
        ]);
    }

    public function batafsil(int $id)
    {
        $user = Auth::user();
        $article = Article::query()->with('user')->findOrFail($id);

        $comment = Comment::query()->with('user')->get();

        $likes = Like::query()->where('post_id', '=', $article->id)->count();

        $dislikes = Dislikes::query()->where('post_id', '=', $article->id)->count();

        $views = View::query()->where('post_id', '=', $article->id)->count();

        $view = View::query()->where([
            'user_id' => $user->id,
            'post_id' => $id
        ])->first();
        if ($view == null) {
            $view = View::query()->create([
                'user_id' => $user->id,
                'post_id' => $id,
            ]);
        }
        return view('article.show', [
            'article' => $article,
            'comment' => $comment,
            'likes' => $likes,
            'dislikes' => $dislikes,
            'views' => $views,
        ]);

    }

    public function articleNews()
    {
        $article = Article::query()->get();

        $article->load('user');
        return view('article.news', [
            'article' => $article
        ]);
    }
    public function articleNewsShow(int $id)
    {
        $article = Article::query()->find($id);
        return view('article.newsShow', [
            'article' => $article
        ]);
    }
    public function editIndex(int $id)
    {
        $article = Article::query()->find($id);
        return view('article.edit', [
            'article' => $article
        ]);
    }
    public function ArticleEdit(EditUpdateRequest $request, int $id)
    {
        $article = Article::query()->find($id);
        $validated = $request->validated();
        if ($article == null) {
            return redirect()->route('article.index');
        }
        if (isset($validated['image'])) {

            if ($article->image != null) {
                Storage::disk('public')->delete($article->image);
            }

            $path = Storage::disk('public')->put('articleImage/', $validated['image']);
            $article->image = $path;
        }

        if (isset($validated['title'])) {
            $article->title = $validated['title'];
        }
        if (isset($validated['content'])) {
            $article->content = $validated['content'];
        }
        $article->save();
        return redirect()->route('article.index');
    }
    public function ArticleDelete(int $id)
    {
        $article = Article::query()->find($id);
        if ($article == null) {
            return redirect()->route('article.index');
        }
        $path = Storage::disk('public')->delete($article->image);
        $article->image = $path;
        $article->delete();
        return redirect()->route('article.index');
    }
    public function CreateIndex()
    {
        return view('article.create');
    }
    public function articleCreate(ArticleCreateRequest $request)
    {
        $validated = $request->validated();
        $path = Storage::disk('public')->put('/articleCreate', $validated['image']);
        $auth = Auth::user();
        $article = Article::query()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'sarlavha_haqida' => $validated['sarlavha_haqida'],
            'image' => $path,
            'user_id' => $auth->id
        ]);
        return redirect()->route('article.index');
    }
}
