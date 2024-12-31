@extends('admin.layouts.layout')
@section('title', 'Phản hồi')
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Trả lời phản hồi</h3>
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
                    <div class="text-tiny">Trả lời phản hồi</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="card-body p-5">
                <form action="{{ route('admin.contacts.sendReply', $contact->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold h5 pb-5" for="reply_message">Nội dung tin nhắn:</label>
                        <textarea name="reply_message" class="form-control" rows="5" style="font-size: 20px" placeholder="Nhập nội dung tin nhắn"></textarea>
                        @error('reply_message')
                            <span style="color: red; font-size: 18px; margin-top: 10px; margin-bottom: 10px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-3 mt-3">
                        <button type="submit" class="btn btn-success btn-lg">
                            Gửi phản hồi
                        </button>
                        <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-outline-primary btn-lg">
                            Quay lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
