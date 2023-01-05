<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("web.post.index")->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot("create", Post::class)) {
            abort(403);
        }
        return view("web.post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check() && !Auth::user()->superuser) {
            return abort(403);
        }

        $data = $request->validate([
            "title" => ["required", "unique:posts,title", "max:255"],
            "introduction" => ["required", "max:65536"],
            "body" => ["required"],
        ]);
        $data["user_id"] = Auth::id();

        $post = Post::firstOrCreate($data);
        $post->save();

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->has("like")) {
            switch ($request->input("like")) {
                case "1":
                    $post->like();
                    break;

                case "-1":
                    $post->dislike();
                    break;

                default:
                    break;
            }
        }
        return view("web.post.show")->with(["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("web.post.edit")->with(["post" => Post::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::vheck() && !Auth::user()->superuser) {
            return abort(403);
        }

        $data = $request->validate([
            "title" => ["required", "unique:posts,title", "max:255"],
            "introduction" => ["required", "max:65536"],
            "body" => ["required"],
        ]);

        $post = Post::find($id);
        $post->title = $data["title"];
        $post->introduction = $data["introduction"];
        $post->body = $data["body"];
        $post->save();

        return redirect()->route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return back();
    }
    /**
     * search posts
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return null;
    }
}
