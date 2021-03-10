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

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function categoryCheck($category_id)
    {
        $posts_of = \App\Models\Post::where("category_id", "=", $category_id)->paginate(5);
        $_SESSION = ['category'     => $posts_of->first()->category->title,
                    'pagination_of' => "category/".$posts_of->first()->category_id];

        return view('pages/post-display', ['posts' => $posts_of]);
    }

    public function categoryAll()
    {
        $categories = \App\Models\Category::paginate(5);

        $_SESSION['pagination_of'] = 'categories';

        return view('pages/categories-display', ['categories' => $categories]);
    }

    public function create()
    {
        ;
        return view('category/form_category');
    }

    public function createSave(Request $request)
    {
        $data = $request->validate([
            'title'    => ['required', 'unique:posts,title', 'min:5', 'max:255', 'string'],
            'slug'     => ['required', 'min:5', 'max:255', 'string'],
        ]);

        $category = Category::create($data);

        return redirect()->route('list-all-categories')->with('status', 'A new category has been created!');
    }

    public function update(\App\Models\Category $category)
    {
        return view('category/form_category', ['post' => $category]);
    }

    public function updateSave(Request $request, \App\Models\Category $category)
    {
        $data = $request->validate([
            'title'    => ['required', 'unique:posts,title', 'min:5', 'max:255', 'string'],
            'slug'     => ['required', 'min   :5', 'max:255', 'string'],
        ]);

        $category->update($data);

        return redirect()->route('list-all-categories')->with('status', 'A category has been updated!');
    }

    public function delete(\App\Models\Category $category)
    {
        $category->delete();

        return redirect()->route('list-all-categories')->with('status', 'A category has been deleted!');
    }
}
