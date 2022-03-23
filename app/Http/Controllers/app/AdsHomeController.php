<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Advertising\Ads;
use App\Models\Advertising\AdsCategory;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;

class AdsHomeController extends Controller
{

    public function Index()
    {
        $ads = Ads::orderBy('created_at','desc')->paginate(8);
        return view('app.pages.ads.index',compact('ads'));
    }

    public function single(Ads $ad,AdsCategory $category)
    {
        $adsCategories = AdsCategory::all();
        $latestAds = Ads::orderBy('created_at','desc')->limit(4)->get();
        return view('app.pages.ads.single',compact('adsCategories','ad','latestAds'));
    }

    public function category(AdsCategory $category)
    {
        $ads = $category->ads()->paginate(8);
        return view('app.pages.ads.index',compact('ads'));
    }


}
