<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug) {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        // $posts = Post::where('category_id', $category->id)->get();
        // dd($posts);
        $data = [
            'category' => $category,
            // 'posts' => $posts,
        ];

        return view('guest.categories.show', $data);
    }
}
