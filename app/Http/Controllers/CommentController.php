<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function Comment(CommentRequest $request)
    {
       $user = Auth::user();
        $validated = $request->validated();

        $comment = Comment::query()->create([
            'comment' => $validated['comment'],
            'user_id'=> $user->id,
            'article_id' => $validated['article_id']
        ]);
        return redirect()->route('batafsil.index', $validated['article_id']);
    }
}
