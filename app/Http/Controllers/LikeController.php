<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use App\Models\Article;
use App\Models\Dislikes;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function response_type(LikeRequest $request)
    {
        $user = Auth::user();
        $validated = $request->validated();

        if ($validated['response_type'] == 'likes') {
            $like = Like::query()->where(
                'user_id',
                '=',
                $user->id,
            )->where(
                'post_id',
                '=',
                $validated['post_id']
            )->first();

            if ($like == null) {
                Like::query()->create([
                    'user_id' => $user->id,
                    'post_id' => $validated['post_id'],
                ]);
            }
        }


        $dislikes = Dislikes::query()->where([
            'user_id' => $user->id,
            'post_id' => $validated['post_id'],
        ])->first();
        if ($validated['response_type'] == 'likes' && $dislikes != null) {
               $dislikes->delete();
        }


        if ($validated['response_type'] == 'dislikes') {

            $dislikes = Dislikes::query()->where([
                'user_id' => $user->id,
                'post_id' => $validated['post_id'],
            ])->first();

            if ($dislikes == null) {
                Dislikes::query()->create([
                    'post_id' => $validated['post_id'],
                    'user_id' => $user->id,
                ]);
            }
        }
        $likes = Like::query()->where([
            'user_id' => $user->id,
            'post_id' => $validated['post_id'],
        ])->first();

        if ($validated['response_type'] == 'dislikes' && $likes != null) {
            $likes->delete();
     }


        return redirect()->route('batafsil.index', $validated['post_id']);
    }
}
