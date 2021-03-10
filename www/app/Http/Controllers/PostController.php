<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        $users      = \App\Models\User::all();
        $categories = \App\Models\Category::all();
        $tags       = \App\Models\Tag::all();

        return view('post/form_post', ['users'      => $users,
                                        'categories' => $categories,
                                        'tags'       => $tags ]);
    }

    public function createSave(Request $request)
    {
        $data = $request->validate([
            'user_id'     => ['required', 'exists:users,id'],
            'category_id' => ['exists:categories,id', 'required'],
            'title'    => ['required', 'unique:posts,title', 'min:5', 'max:255', 'string'],
            'slug'     => ['required', 'min:5', 'max:255', 'string'],
            'body'     => ['required', 'min:5', 'max:3000', 'string'],
            'tags'     => ['exists:tags,id', 'required',],
        ]);

        $new_post = Post::create($data);
        $new_post->tags()->attach($data['tags']);

        return redirect()->route('home')->with('status', 'A new post has been created!');
    }

    public function update(\App\Models\Post $post)
    {
        $users        = \App\Models\User::all();
        $categories   = \App\Models\Category::all();
        $tags         = \App\Models\Tag::all();
        $fuck_you_php = $post->tags->pluck('id')->toArray();

        return view('post/form_post', ['users'         => $users,
                                        'post'         => $post,
                                        'categories'   => $categories,
                                        'fuck_you_php' => $fuck_you_php,
                                        'tags'         => $tags ]);
    }

    public function updateSave(Request $request, \App\Models\Post $post)
    {
        $data = $request->validate([
            'user_id'     => ['required', 'exists:users,id'],
            'category_id' => ['exists:categories,id', 'required'],
            'title'    => ['required', 'unique:posts,title', 'min:5', 'max:255', 'string'],
            'slug'     => ['required', 'min   :5', 'max:255', 'string'],
            'body'     => ['required', 'min   :5', 'max:3000', 'string'],
            'tags'     => ['exists            :tags,id', 'required',],
        ]);

        $post->update($data);
        $post->tags()->sync($data['tags']);

        return redirect()->route('home')->with('status', 'A post has been updated!');
    }

    public function delete(\App\Models\Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('home')->with('status', 'A post has been deleted!');
    }
}
