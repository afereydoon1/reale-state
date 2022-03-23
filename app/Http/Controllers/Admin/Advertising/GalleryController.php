<?php

namespace App\Http\Controllers\Admin\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Advertising\GalleryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Advertising\Ads;
use App\Models\Advertising\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery(Ads $ad)
    {
        $galleries = $ad->galleries()->get();
        return view('admin.advertising.gallery.index',compact('ad','galleries'));
    }

    public function storeGalleryImage(GalleryRequest $request,Ads $ad,ImageService $imageService)
    {
        $inputs = [];
        $inputs['advertise_id'] = $ad->id;

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'gallery');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('posts.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $gallery = Gallery::create($inputs);
        return back()->with('toast-success', 'تصویر  جدید با موفقیت به گالری اضافه شد');
    }

    public function deleteGalleryImage(Gallery $gallery)
    {
        $gallery->delete();
        return back()->with('toast-success', 'تصویر  با موفقیت از گالری حذف شد');
    }
}
