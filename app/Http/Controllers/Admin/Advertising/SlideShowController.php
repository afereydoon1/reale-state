<?php

namespace App\Http\Controllers\Admin\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Advertising\SlideShowRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Advertising\SlideShow;
use Illuminate\Http\Request;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = SlideShow::orderBy('created_at','desc')->limit(5)->get();
        return view('admin.advertising.slide-show.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertising.slide-show.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideShowRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();

        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'slide-show');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('slide_show.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $slides = SlideShow::create($inputs);
        return redirect()->route('slide_show.index')->with('toast-success', 'اسلاید  جدید با موفقیت ساخته شد');
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
    public function edit(SlideShow $slideShow)
    {
        return view('admin.advertising.slide-show.edit',compact('slideShow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideShowRequest $request, SlideShow $slideShow,ImageService $imageService)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            if (!empty($slideShow->image)) {
                $imageService->deleteDirectoryAndFiles($slideShow->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'slide-show');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('slide_show.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['image']) && !empty($slideShow->image)) {
                $image = $slideShow->image;
                $inputs['image'] = $image;
            }
        }
        $slideShow->update($inputs);
        return redirect()->route('slide_show.index')->with('toast-success', 'اسلاید با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlideShow $slideShow)
    {
        $slideShow->delete();
        return back();
    }

    public function status(SlideShow $slideShow)
    {

        $slideShow->status = $slideShow->status == 0 ? 1 : 0;
        $result = $slideShow->save();
        if ($result) {
            if ($slideShow->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
