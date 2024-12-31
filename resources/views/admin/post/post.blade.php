@extends('admin.layouts.layout')
@section('title', 'Danh sách bài viết')
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Bài viết</h3>
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
                    <div class="text-tiny">Bài viết</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm..." class="" name="name" tabindex="2" value=""
                                aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{route('post.create')}}"><i class="icon-plus"></i>Thêm mới</a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Thẻ</th>
                                <th>Nội dung</th>
                                <th>Lượt xem</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{!! displayImage($post->image, 250, 150) !!}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                    @foreach($post->tags as $tag)
                                    {{ $tag->tag_name }}
                                    @if(!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td>{{ Str::limit($post->content, 20) }}</td>
                                <td>{{$post->views}}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{route('post.edit',$post->postID)}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('post.destroy', $post->postID) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item text-danger delete" style="border: none; background: none; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
                {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "Bạn muốn xoá?",
                text: "Bạn có chắc muốn xoá banner này?",
                type: "warning",
                buttons: ["Không", "Có"],
                confirmButtonColor: '#dc3545',
            }).then(function(result) {
                if (result) {
                    form.submit();
                }
            });
        });

    });
</script>
@endpush