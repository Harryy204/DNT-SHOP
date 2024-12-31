<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(12);
        return view('admin.comments.index', compact('comments'));
    }



    public function search_comments(Request $request)
    {
        $query = $request->input('search');

        // Tìm kiếm bình luận theo content, hoặc title trong bảng posts và full_name trong bảng users
        $comments = Comment::with(['user', 'post'])
            ->where('content', 'like', '%' . $query . '%')
            ->orWhereHas('post', function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
            })
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('full_name', 'like', '%' . $query . '%');
            })
            ->get();

        return response()->json($comments);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'post_id' => 'required|exists:posts,postID', // Ensure post_id exists in posts table, adjust if needed
            'content' => 'required|string|max:1000', // Validate content length
        ]);

        // Create a new comment
        Comment::create([
            'post_id' => $request->post_id, // The ID of the post the comment is associated with
            'user_id' => Auth::id(), // The ID of the authenticated user
            'content' => $request->content, // The content of the comment
        ]);

        // Redirect back to the post details with a success message
        return redirect()->route('post.details', $request->post_id)->with('success', 'Bình luận đã được gửi thành công!');
    }


    /**
     * Display the specified resource.
     */

    public function show($postID)
    {
        // Lấy bài viết với các bình luận
        $post = Post::with('comments.user')->findOrFail($postID);

        // Lấy các bài viết khác (nếu cần thiết)
        $posts = Post::where('postID', '!=', $postID)->get();

        // Truyền dữ liệu vào view
        return view('posts.details', compact('post', 'posts'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comments = Comment::findorFail($id);
        $comments->delete();
        return redirect()->route('comments.index')->with('success', 'Xoá bình luận thành công');
    }
    public function trash()
    {
        $comments = Comment::onlyTrashed()->get();
        return view('admin.comments.trash', compact('comments'));
    }
}
