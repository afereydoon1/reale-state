<?php

namespace App\Http\Controllers\Admin\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Advertising\AdsCategoryRequest;
use App\Models\Advertising\AdsCategory;

class AdsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsCategories = AdsCategory::orderBy('created_at', 'desc')->get();
        return view('admin.advertising.category.index', compact('adsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertising.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsCategoryRequest $request)
    {
        $inputs = $request->all();
        $adsCategory = AdsCategory::create($inputs);
        return redirect()->route('ads_categories.index')->with('toast-success','دسته بندی با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdsCategory $adsCategory)
    {
        return view('admin.Advertising.category.edit', compact('adsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsCategoryRequest $request, AdsCategory $adsCategory)
    {
        $inputs = $request->all();
        $adsCategory->update($inputs);
        return redirect()->route('ads_categories.index')->with('toast-success','دسته بندی با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdsCategory $adsCategory)
    {
        $result = $adsCategory->delete();
        return redirect()->route('ads_categories.index');
    }
}
