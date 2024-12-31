@extends('admin.layouts.layout')
@section('title', 'Danh sách thẻ')
@push('styles')
<style>
    .wg-table.table-all-user.wg-auto>* {
        min-width: 115px;
    }

    @media (max-width: 1440px) {
        .wg-table.table-all-user.wg-auto>* {
            min-width: auto;
        }
    }

    @media (max-width: 767px) {
        .wg-table.table-all-user.wg-auto>* {
            min-width: 750px;
        }
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thẻ Bài Viết</h3>
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
                    <div class="text-tiny">Thẻ bài viết</div>
                </li>
            </ul>
        </div>

        <section class="tf-section-7">
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="search" placeholder="Tìm kiếm theo tên thương hiệu" class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="wg-table table-all-user wg-auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên thẻ</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $index => $tag)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$tag->tag_name}}</td>
                                <td>
                                    <div class="list-icon-function justify-content-center">
                                        <a href="{{route('tag.edit',$tag->tagID)}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('tag.destroy', $tag->tagID) }}" method="POST" class="delete-form">
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
                {{ $tags->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div class="">
                <form method="POST" enctype="multipart/form-data" action="{{route('tag.store')}}" class="wg-box">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Tên Thẻ <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Tên tags" name="name"
                            tabindex="0" value="" aria-required="true" required="">
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </section>
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