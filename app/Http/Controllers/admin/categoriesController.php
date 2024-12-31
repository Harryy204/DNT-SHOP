<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function categories(Request $request){
        $categories = Categories::query();
        $search = $request->input('name');

        if ($search) {
            $categories->where('category_name', 'like', '%' . $search . '%');
        }
        $categories =$categories->orderBy('created_at','desc')->paginate(12);
        return view('admin.categories.list',compact('categories'));
    }
    public function categories_add(){
        return view('admin.categories.add');
    }
    public function categories_store(Request $request){
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048']);

            $data=[
                'category_name'=>$request['category_name'],
                'slug'=>Slug($request['category_name']),
                'description'=>$request['description'],
                'image'=>$request['image']
            ];

        if ($request->hasFile('image')) {
            $image = $request['image'];
            $data['image'] = saveImage($image, '/uploads/categories','');
        }

        Categories::create($data);
        return redirect()->route('admin.categories')->with('success','Đã thêm thành công');
    }
    public function categories_edit($categoriesID){
        $categories = Categories::find($categoriesID);
        return view('admin.categories.edit', compact('categories'));
    }
    public function categories_update(Request $request, $categoriesID){
        $request->validate([
                'category_name' => 'required',
                'description' => 'required',
                'up_image' => 'required|mimes:jpeg,jpg,png|max:2048']);

        $category= Categories::find($categoriesID);

        $category['category_name']=$request['category_name'];
        $category['slug']=Slug($request['category_name']);
        $category['description']=$request['description'];


        if ($request->hasFile('up_image')) {
            if (File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }

            $image = $request['up_image'];
            $category['image'] = saveImage($image, '/uploads/categories','');
        }

        $category->save();
        return redirect()->route('admin.categories')->with('success','Đã cập nhật thành công');
    }
    public function categories_delete($categoriesID){
        $categories = Categories::find($categoriesID);
        if (File::exists(public_path($categories->image))) {
            File::delete(public_path($categories->image));
        }
        $categories->delete();
        return redirect()->route('admin.categories')->with('success','Đã xóa thành công');
    }

}
