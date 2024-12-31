@extends('admin.layouts.layout')

@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Bình luận</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Bình luận</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form id="search-form" class="form-search" onsubmit="event.preventDefault(); searchComments();">
                        <fieldset class="name">
                            <input type="text" id="search-input" placeholder="Tìm kiếm theo bình luận" name="search">
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên người dùng</th>
                                <th>Tên bài viết</th>
                                <th>Nội dung bình luận</th>
                                <th>Ngày đăng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="comment-table-body">
                            @forelse ($comments as $comment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$comment->user->full_name}}</td>
                                <td>{{$comment->post->title}}</td>
                                <td>{{ Str::limit($comment->content, 20) }}</td>
                                <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('post.comments', $comment->post->postID) }}">
                                            <div class="item edit">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('comments.destroy', $comment->commentID) }}" method="POST" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xoá mục này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item text-danger delete" style="border: none; background: none; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Không có bình luận nào</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
                    {{ $comments->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.body.style.overflow = "auto";

    function searchComments() {
        const query = document.getElementById('search-input').value;

        fetch(`admin/comments/search?search=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('comment-table-body');
                tableBody.innerHTML = ''; // Xóa nội dung cũ

                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="6" class="text-center">Không có bình luận nào phù hợp.</td></tr>`;
                } else {
                    data.forEach((comment, index) => {
                        tableBody.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${comment.user.full_name}</td>
                            <td>${comment.post.title}</td>
                            <td>${comment.content.substring(0, 20)}...</td>
                            <td>${new Date(comment.created_at).toLocaleDateString('vi-VN')} ${new Date(comment.created_at).toLocaleTimeString('vi-VN')}</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{ url('post/comments') }}/${comment.post.postID}">
                                        <div class="item edit"><i class="icon-eye"></i></div>
                                    </a>
                                    <form action="/comments/${comment.commentID}" method="POST" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xoá mục này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item text-danger delete" style="border: none; background: none; cursor: pointer;">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>`;
                    });
                }
            })
            .catch(error => console.error('Lỗi:', error));
    }
</script>
@endpush