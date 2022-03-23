<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function Index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        return view('app.pages.blog.index',compact('posts'));
    }

    public function single(Post $post,PostCategory $category)
    {
        $postCategories = PostCategory::all();
        $latestPosts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('app.pages.blog.single',compact('postCategories','post','latestPosts'));
    }

    public function category(PostCategory $category)
    {
        $posts = $category->posts()->paginate(8);
        return view('app.pages.blog.index',compact('posts'));
    }

}
