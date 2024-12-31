@extends('admin.layouts.layout')
@section('main')
<style>
    .main-content-inner {
        max-height: 1000px;
        overflow: auto;
    }

    .btn-status {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 24px;
        color: #007bff;
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .btn-status:hover {
        color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-status:active {
        transform: translateY(0);
    }

    .sr-only {
        display: none;
    }
</style>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Mã giảm giá</h3>
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
                    <div class="text-tiny">Mã giảm giá</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form id="search-form" class="form-search" onsubmit="event.preventDefault(); searchPromotions();">
                        <fieldset class="name">
                            <input type="text" id="search-input" placeholder="Tìm kiếm theo mã giảm giá" name="search">
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>

                </div>
                <a class="tf-button style-1 w208" href="{{ route('promotions.create')}}"><i
                        class="icon-plus"></i>Thêm mới</a>
            </div>
            <div class="wg-table table-all-user">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã giảm giá</th>
                            <th>Loại chiết khấu</th>
                            <th>Giá trị chiết khấu</th>
                            <th>Trạng thái</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="promotion-table-body">
                        @forelse ($promotions as $promotion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $promotion->code }}</td>
                            <td>{{ ($promotion->discount_type == 'fixed')? 'Giá tiền cố định' : ' Phần trăm' }}</td>
                            <td>{{ ($promotion->discount_type == 'fixed')? number_price($promotion->discount_value) : number_format($promotion->discount_value, 0, ',', '.') . '%' }}</td>
                            <td class="status-cell text-center" title="{{ $promotion->status === 'active' ? 'Nhấn để hủy kích hoạt' : 'Nhấn để kích hoạt' }}">
                                <button class="activate-button btn-status" data-id="{{ $promotion->promotionID }}">
                                    <i class="{{ $promotion->status === 'active' ? 'icon-eye' : 'icon-eye-off' }}" aria-hidden="true"></i>
                                </button>
                            </td>



                            <td>{{ $promotion->start_date }}</td>
                            <td>{{ $promotion->end_date }}</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{ route('promotions.edit', $promotion->promotionID) }}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('promotions.destroy', $promotion->promotionID) }}" method="POST" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xoá mục này?');">
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
                            <td colspan="8" class="text-center">Không có mã giảm giá nào.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
            {{ $promotions->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const activateButtons = document.querySelectorAll('.activate-button');
        const searchForm = document.getElementById('search-form');
        const searchInput = document.getElementById('search-input');
        const promotionTableBody = document.getElementById('promotion-table-body');

        // Function to activate promotions
        activateButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const promotionId = this.dataset.id;

                fetch(`{{ route('promotions.activate', ':id') }}`.replace(':id', promotionId), {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            const newStatus = data.status;
                            if (newStatus === 'active') {
                                button.querySelector('i').className = 'icon-eye';
                                button.setAttribute('title', 'Nhấn để hủy kích hoạt');
                            } else {
                                button.querySelector('i').className = 'icon-eye-off';
                                button.setAttribute('title', 'Nhấn để kích hoạt');
                            }
                        } else {
                            alert(data.message || 'Đã có lỗi xảy ra. Vui lòng thử lại.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

    });

    function searchPromotions() {
        const query = document.getElementById('search-input').value;
        fetch(`promotions/search?search=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('promotion-table-body');
                tableBody.innerHTML = ''; // Xóa nội dung cũ

                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="8" class="text-center">Không có mã giảm giá nào phù hợp.</td></tr>`;
                } else {
                    data.forEach((promotion, index) => {
                        tableBody.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${promotion.code}</td>n
                                <td>${promotion.discount_type}</td>
                                <td>${promotion.discount_value}</td>
                                <td class="status-cell text-center">
                                    <button class="activate-button btn-status" data-id="${promotion.promotionID}" onclick="toggleStatus(${promotion.promotionID})">
                                        <i class="${promotion.status === 'active' ? 'icon-eye' : 'icon-eye-off'}"></i>
                                    </button>
                                </td>
                                <td>${promotion.start_date}</td>
                                <td>${promotion.end_date}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="/promotions/${promotion.promotionID}/edit"><div class="item edit"><i class="icon-edit-3"></i></div></a>
                                        <form action="/promotions/${promotion.promotionID}" method="POST" class="delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xoá mục này?');">
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