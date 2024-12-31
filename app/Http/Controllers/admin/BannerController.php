<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;

class BannerController extends Controller
{
    // banners
    public function banners(Request $request)
    {
        $search = $request->input('name');
        
        if ($search) {
            $banners = Banner::where('hidden', 'like', '%' . $search . '%')
                ->orderBy('bannerID', 'asc')
                ->paginate(10);
        } else {
            $banners = Banner::orderBy('bannerID', 'asc')->paginate(10);
        }
        

        return view('admin.banner.banner', compact('banners', 'search'));
    }

    public function banner_add()
    {
        return view('admin.banner.banner-add');
    }

    public function banner_store(Request $request)
    {
        $request->validate([
            'position' => 'required|integer|unique:banners,position',
            'hidden' => 'required|in:0,1',
            'image_url' => 'required|mimes:jpeg,jpg,png,webp|max:2048'
        ], [
            'position.required' => 'Vị trí không được để trống!',
            'position.unique' => 'Vị trí đã tồn tại. Vui lòng chọn vị trí khác!',
            'hidden.required'  => 'Trạng thái không được để trống!',
            'hidden.in' => 'Trạng thái không hợp lệ!',
            'image_url.required' => 'Hình ảnh không được để trống!',
            'image_url.mimes' => 'Hình ảnh phải có định dạng: jpeg, jpg, png, webp!',
            'image_url.max' => 'Hình ảnh không được vượt quá 2MB!'
        ]);

        $banner = new Banner();
        $banner->position = $request->position;
        $banner->hidden = $request->hidden;

        $image_url = $request->file('image_url');
        $banner->image_url = saveImage($image_url, '/uploads/banners','');
        $banner->save();

        return redirect()->route('admin.banner')->with('success', 'Banner đã được thêm');
    }

    public function banner_edit($bannerID)
    {
        $banner = Banner::find($bannerID);
        return view('admin.banner.banner-edit', compact('banner'));
    }

    public function banner_update(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'hidden' => 'required|in:0,1',
            'image_url' => 'nullable|mimes:jpeg,jpg,png,webp|max:2048'
        ],[
            'position.required' => 'Vị trí không được để trống!',
            'hidden.required'  => 'Trạng thái không được để trống!',
            'hidden.in' => 'Trạng thái không hợp lệ!',
            // 'image_url.required' => 'Hình ảnh không được để trống!',
            'image_url.mimes' => 'Hình ảnh phải có định dạng: jpeg, jpg, png, webp!',
            'image_url.max' => 'Hình ảnh không được vượt quá 2MB!'
        ]);

        $banner = Banner::find($request->bannerID);
        if (Banner::where('position', $request->position)->where('bannerID', '!=', $request->bannerID)->exists()) {
            return redirect()->back()->withErrors(['position' => 'Vị trí đã tồn tại. Vui lòng chọn vị trí khác!']);
        }
    
        $banner->position = $request->position;
        $banner->hidden = $request->hidden;
        

        if ($request->hasFile('image_url')) {
            
            if (File::exists(public_path($banner->image_url))) {
                File::delete(public_path($banner->image_url));
            }
            
            
            $image = $request->file('image_url');
            $banner->image_url = saveImage($image, '/uploads/banners',''); 
        }

        $banner->save();
        return redirect()->route('admin.banner')->with('success', 'Banner đã được cập nhật');
    }

    public function banner_delete($bannerID)
    {
        $banner = Banner::find($bannerID);
        if (File::exists(public_path($banner->image_url))) {
            File::delete(public_path($banner->image_url));
        }
        $banner->delete();
        return redirect()->route('admin.banner')->with('success', 'Banner đã được xoá');
    }
}
