@extends('admin.layouts.layout')
@section('title', 'Thông tin góp ý')
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
                <div class="card-body p-5">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="col-4">Thông tin</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Tên</th>
                                    <td>{{ $contacts->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $contacts->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Số điện thoại</th>
                                    <td>{{ $contacts->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nội dung</th>
                                    <td>{{ $contacts->comment }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ngày gửi</th>
                                    <td>{{ $contacts->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('admin.contacts.reply', $contacts->id) }}" method="GET" class="d-flex gap-3">
                        <button type="submit" class="btn btn-outline-success btn-lg">
                            <i class="bi bi-reply"></i> Trả lời
                        </button>
                        <a href="{{ route('admin.contacts') }}" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-arrow-left-circle"></i> Quay lại
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
