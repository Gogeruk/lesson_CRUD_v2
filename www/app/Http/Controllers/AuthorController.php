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
use Illuminate\Http\RedirectResponse;

class AuthorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function author($author)
    {
        $posts_of = \App\Models\Post::where("user_id", "=", $author)->paginate(5);
        $_SESSION = ['user'         => $posts_of->first()->user->name,
                    'pagination_of' => "author/".$posts_of->first()->user->id];

        return view('pages/post-display', ['posts' => $posts_of]);
    }

    public function author_category($user_id, $category_id)
    {
        $posts_of = \App\Models\Post::whereHas('user', function (\Illuminate\Database\Eloquent\Builder $query) use ($user_id, $category_id) {
            $query->where('user_id', '=', $user_id);
            $query->where('category_id', '=', $category_id);
        })->paginate(5);

        $_SESSION = ['user'         => $posts_of->first()->user->name,
                    'category'      => $posts_of->first()->category->title,
                    'pagination_of' => "author/".$posts_of->first()->user_id."/category/".$posts_of->first()->category_id];

        return view('pages/post-display', ['posts' => $posts_of]);
    }

    public function author_category_tag($user_id, $category_id, $tag_id)
    {
        $tag = \App\Models\Tag::where('id', "$tag_id")->first();
        $posts_of = \App\Models\Post::whereHas('tags', function (\Illuminate\Database\Eloquent\Builder $query) use ($user_id, $category_id, $tag_id) {
            $query->where('user_id', '=', $user_id);
            $query->where('category_id', '=', $category_id);
            $query->where('tag_id', '=', $tag_id);
        })->paginate(5);

        $_SESSION =['user'          => $posts_of->first()->user->name,
                    'tag'           => $tag->title,
                    'category'      => $posts_of->first()->category->title,
                    'pagination_of' => "author/".$posts_of->first()->user_id."/category/".$posts_of->first()->category_id."/tag/".$tag->id];

        return view('pages/post-display', ['posts' => $posts_of]);
    }
}
