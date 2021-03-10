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

class TagController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function tagCheck($title)
    {
        $tag = \App\Models\Tag::where('title', "$title")->first();

        $posts_of = $tag->posts()->paginate(5);

        $_SESSION = ['tag'         => $tag->title,
                    'pagination_of' => "tag/$tag->title"];

        return view('pages/post-display', ['posts' => $posts_of]);
    }

    public function tagAll()
    {
        $tags = \App\Models\Tag::paginate(5);

        $_SESSION['pagination_of'] = 'tags';

        return view('pages/tags-display', ['tags' => $tags]);
    }

    public function create()
    {
        ;
        return view('tag/form_tag');
    }

    public function createSave(Request $request)
    {
        $data = $request->validate([
            'title'    => ['required', 'unique:posts,title', 'min:5', 'max:255', 'string'],
            'slug'     => ['required', 'min:5', 'max:255', 'string'],
        ]);

        $new_tag = Tag::create($data);

        return redirect()->route('list-all-tags')->with('status', 'A new tag has been created!');
    }

    public function update(\App\Models\Tag $tag)
    {
        return view('tag/form_tag', ['post' => $tag]);
    }

    public function updateSave(Request $request, \App\Models\Tag $tag)
    {
        $data = $request->validate([
            'title'    => ['required', 'unique:posts,title', 'min:5', 'max:255', 'string'],
            'slug'     => ['required', 'min   :5', 'max:255', 'string'],
        ]);

        $tag->update($data);

        return redirect()->route('list-all-tags')->with('status', 'A tag has been updated!');
    }

    public function delete(\App\Models\Tag $tag)
    {
        $tag->delete();

        return redirect()->route('list-all-tags')->with('status', 'A tag has been deleted!');
    }
}
