<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Create comment
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            "body" => ["required"],
            "user_id" => ["required"],
            "post_id" => ["required"],
        ]);
        $post = Comment::create($data);
        $post->save();

        return redirect(url()->previous());
    }
}
