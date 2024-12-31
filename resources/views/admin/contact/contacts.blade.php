@extends('admin.layouts.layout')
@section('title', 'Danh sách góp ý')
@section('main')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Quản Lý Góp Ý Và Phản Hồi</h3>
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
                        <div class="text-tiny">Quản Lý Góp Ý Và Phản Hồi</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search" action="{{ route('admin.contacts') }}" method="GET">
                            <fieldset class="name">
                                <input type="text" placeholder="Tìm kiếm tên người gửi..." class="border border-secondary" name="name"
                                    tabindex="3" value="{{ request()->input('name') }}" aria-required="true">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="wg-table table-all-user">
                    {{-- @if (Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif --}}
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Ngày gửi</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td class="email text-break">{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ Str::limit($contact->comment, 20) }}</td>
                                <td>
                                    @if ($contact->status == 'new')
                                        <span style="color: red">Chưa đọc</span>
                                    @else
                                        <span style="color: green">Đã đọc</span>
                                    @endif
                                </td>
                                <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.contacts.show', $contact->id) }}" >
                                            <div class="item eye text-success">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
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
                <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
                    {{ $contacts->links('pagination::bootstrap-5') }}
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
                text: "Bạn có chắc muốn xoá tin nhắn này?",
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
