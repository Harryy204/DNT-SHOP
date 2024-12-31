<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\admin;
use App\Models\Comment;
use Illuminate\Container\Attributes\Auth;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class postController extends Controller
{
    public function post()
    {
        $posts = Post::orderBy('postID', 'desc')->paginate(10);
        return view('admin.post.post', compact('posts'));
    }
    public function index(Request $request)
    {
        $posts =  Post::orderBy('postID', 'desc')->paginate(11);
        $products = Product::inRandomOrder()->limit(12)->get();
        return view('posts.index', compact('posts','products'));
    }
    public function post_details($id)
    {
        $posts = Post::orderBy('created_at','desc')->limit(12)->get();
        $post = Post::findOrFail($id);
        $post->increment('views');
        $products = Product::inRandomOrder()->limit(12)->get();
        $tags = $post->tags;
        $comments = Comment::where('post_id', $id)->paginate(8);
        return view('posts.details', compact('tags', 'post', 'posts','products','comments'));
    }
    public function create()
    {
        $tags = Tag::all();
        return view('admin.post.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpeg,jpg,png,webp|max:2048',
            'tag_id' => 'required|array',
            'tag_id.*' => 'exists:tags,tagID',
        ],[
            'title.required' => 'Tiêu đề không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'tag_id.required' => 'Phải chọn ít nhất một thẻ.',
            'tag_id.exists' => 'Thẻ không tồn tại.',
            'image.mimes' => 'Ảnh phải đúng định dạng.',
            'image.max' => 'Tối đa 2048kb.',
        ]);

        $data = [
            'title' => $request['title'],
            'slug' => Slug($request['title']),
            'content' => $request['content'],
        ];

        if ($request->hasFile('image')) {
            $image = $request['image'];
            $data['image'] = saveImage($image, '/uploads/posts','');
        }
        $post = Post::create($data);
        if ($request->has('tag_id')) {
            $post->tags()->sync($request->tag_id);
        }
        return redirect()->route('post')->with('success', 'Thêm bài viết thành công');
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.post.update', compact('post', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpeg,jpg,png,webp|max:2048',
            'tag_id' => 'required|array',
            'tag_id.*' => 'exists:tags,tagID',
        ], [
            'title.required' => 'Tiêu đề không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'tag_id.required' => 'Phải chọn ít nhất một thẻ.',
            'tag_id.exists' => 'Thẻ không tồn tại.',
            'image.mimes' => 'Ảnh phải đúng định dạng.',
            'image.max' => 'Tối đa 2048kb.',
        ]);

        // Lấy bài viết hiện tại
        $post = Post::findOrFail($id);

        $data = [
            'title' => $request['title'],
            'slug' => Slug($request['title']),
            'content' => $request['content'],
        ];

        if ($request->hasFile('image')) {

            if (File::exists(public_path($post->image))) {
                File::delete(public_path($post->image));
            }
            
            $image = $request['image'];
            $data['image'] = saveImage($image, '/uploads/posts','');
        }

        // Cập nhật bài viết
        $post->update($data);

        // Cập nhật thẻ
        if ($request->has('tag_id')) {
            $post->tags()->sync($request->tag_id);
        }

        return redirect()->route('post')->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy($id)
    {
        
        $post = Post::find($id);

        if (File::exists(public_path($post->image))) {
            File::delete(public_path($post->image));
        }

        $post->delete();
        return redirect()->route('post')->with('success', 'Xoá bài viết thành công!');
    }
}
