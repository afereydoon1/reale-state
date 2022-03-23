<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Advertising\Ads;
use App\Models\Advertising\AdsCategory;
use App\Models\Advertising\SlideShow;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ads = Ads::all();
        $users = User::all();
        $slides = SlideShow::orderBy('created_at','desc')->limit(5)->get();
        $latestAds = Ads::orderBy('created_at','desc')->limit(6)->get();
        $bestAds = Ads::orderBy('view','desc')->orderBy('created_at','desc')->limit(4)->get();
        $posts = Post::where('published_at','<=',date('Y-m-d H:i:s'))->orderBy('created_at','desc')->limit(4)->get();
        return view('app.index',compact('slides','latestAds','bestAds','posts','ads','users'));
    }

    public function aboutUs()
    {
        return view('app.pages.about');
    }

    public function search()
    {
        if(isset($_GET['search']))
        {
            $search = '%' . $_GET['search'] . '%';
            $ads = Ads::where('title', 'LIKE', $search)->whereOr('tag', 'LIKE', $search)->get();
            $posts = Post::where('title', 'LIKE', $search)->get();
            return view('app.pages.search', compact('ads', 'posts'));
        }
        else{
            return back();
        }
    }

}
