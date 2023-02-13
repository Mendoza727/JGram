<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $posts)
    {
        $posts->like()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Request $request, Post $posts)
    {
        $request->user()->likes()->where('post_id', $posts->id)->delete();

        return back();
    }
}
