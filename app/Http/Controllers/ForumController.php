<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumPost;
use App\Models\Tag;
use App\Models\ForumPostLike;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $query = ForumPost::with(['user', 'tags', 'likes', 'comments.user'])->latest();

        // LOGIKA FILTER (Sidebar)
        if ($request->has('tag')) {
            $tagSlug = $request->tag;
            $query->whereHas('tags', function($q) use ($tagSlug) {
                $q->where('slug', $tagSlug);
            });
        }

        $posts = $query->paginate(4)->withQueryString();
        $tags = Tag::all(); 

        return view('forum.index', compact('posts', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'tags' => 'nullable|array'
        ]);

        $post = ForumPost::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        if($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->back()->with('success', 'Posted!');
    }

    public function like($id)
    {
        $existingLike = ForumPostLike::where('user_id', Auth::id())
                        ->where('forum_post_id', $id)
                        ->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            ForumPostLike::create([
                'user_id' => Auth::id(),
                'forum_post_id' => $id
            ]); // Like
        }

        return redirect()->back(); 
    }

    public function comment(Request $request, $id)
    {
        $request->validate(['body' => 'required']);

        Comment::create([
            'user_id' => Auth::id(),
            'forum_post_id' => $id,
            'body' => $request->body
        ]);

        return redirect()->back();
    }
}