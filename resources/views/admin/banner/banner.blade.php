@extends('admin.layouts.layout')
@section('title', 'Danh sách banner')
@section('main')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Banners</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Bảng điều khiển</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Banners</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search" action="{{ route('admin.banner') }}" method="GET">
                            <fieldset class="name">
                                <input type="text" placeholder="Tìm kiếm trạng thái..." class="border border-secondary" name="name"
                                    tabindex="2" value="{{ request()->input('name') }}" aria-required="true">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('admin.banner.add') }}"><i
                            class="icon-plus"></i>Thêm mới</a>
                </div>
                <div class="wg-table table-all-user">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 40px;" class="text-center">#</th>
                                <th class="text-center">Ảnh</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Vị trí</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="image pname" style="width: 150px; height: auto;">
                                        <img src="{{$banner->image_url}}" alt="{{ $banner->bannerID }}" class="" >
                                    </div>
                                </td>
                                <td class="text-center">{{ $banner->hidden ? 'Ẩn' : 'Hiện' }}</td>
                                <td class="text-center">{{ $banner->position }}</td>
                                <td>
                                    <div class="list-icon-function justify-content-center">
                                        <a href="{{ route('admin.banner.edit', $banner->bannerID) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.banner.delete', $banner->bannerID) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $banners->links('pagination::bootstrap-5') }}
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
