<?php
function Slug($string)
{
    // Chuyển đổi các ký tự tiếng Việt có dấu thành không dấu
    $vietnameseChars = array(
        'a' => 'á|à|ả|ạ|ã|â|ấ|ầ|ẩ|ậ|ẫ|ă|ắ|ằ|ẳ|ặ|ẵ',
        'e' => 'é|è|ẻ|ẹ|ẽ|ê|ế|ề|ể|ệ|ễ',
        'i' => 'í|ì|ỉ|ị|ĩ',
        'o' => 'ó|ò|ỏ|ọ|õ|ô|ố|ồ|ổ|ộ|ỗ|ơ|ớ|ờ|ở|ợ|ỡ',
        'u' => 'ú|ù|ủ|ụ|ũ|ư|ứ|ừ|ử|ự|ữ',
        'y' => 'ý|ỳ|ỷ|ỵ|ỹ',
        'd' => 'đ',
        'A' => 'Á|À|Ả|Ạ|Ã|Â|Ấ|Ầ|Ẩ|Ậ|Ẫ|Ă|Ắ|Ằ|Ẳ|Ặ|Ẵ',
        'E' => 'É|È|Ẻ|Ẹ|Ẽ|Ê|Ế|Ề|Ể|Ệ|Ễ',
        'I' => 'Í|Ì|Ỉ|Ị|Ĩ',
        'O' => 'Ó|Ò|Ỏ|Ọ|Õ|Ô|Ố|Ồ|Ổ|Ộ|Ỗ|Ơ|Ớ|Ờ|Ở|Ợ|Ỡ',
        'U' => 'Ú|Ù|Ủ|Ụ|Ũ|Ư|Ứ|Ừ|Ử|Ự|Ữ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỵ|Ỹ',
        'D' => 'Đ'
    );
    foreach ($vietnameseChars as $nonAccent => $accented) {
        $string = preg_replace("/($accented)/i", $nonAccent, $string);
    }

    // Loại bỏ các ký tự không phải là chữ hoặc số và thay khoảng trắng bằng dấu gạch ngang
    $string = preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
    $string = preg_replace('/\s+/', '-', trim($string));

    // Chuyển chuỗi về dạng chữ thường
    return strtolower($string);
}

// Tính sản phẩm được giảm giá bao nhiêu %
function discountPercent($price,$discount){
    if($discount == 0 ){
        return 0;
    }

    $percent = (($price-$discount) / $price ) * 100 ;
    return '- '.round($percent) .'%';
}

// Chuyển roles sang vietnam
function role_vn($role)
{
    $role_name = [
        1 => 'Quản trị viên',
        0 => 'Người dùng',
    ];
    return $role_name[$role];
}

// Thêm vnd sau số tiền
function number_price($price)
{
    return number_format($price, 0, ',', '.') . ' ₫';
}

// Tính số tiền được giảm từ phiếu giảm giá
function getPromoDiscount($type, $value, $total_amount)
{
    $discount = 0;
    if ($type == 'percentage') {
        $discount = $total_amount * ($value / 100);
    } else if ($type  == 'fixed') {
        $discount = $value;
    }

    return $discount;
}

//hiển thị ảnh
function displayImage($imagePath, $width = 100, $height = 100)
{
    if (file_exists(public_path($imagePath))) {
        return '<img src="' . asset($imagePath) . '" alt="Hình ảnh" style="width: ' . $width . 'px; height: ' . $height . 'px; object-fit: cover;">';
    } else {
        return '<img src="' . asset('path/to/default/image.jpg') . '" alt="Hình ảnh không có" style="width: ' . $width . 'px; height: ' . $height . 'px; object-fit: cover;">';
    }
}

// Chuyển phương thức thanh toán sang tiếng việt
function payment_method_vn($payment)
{
    $payment_method_vn = [
        'bank_transfer' => 'Thanh toán qua ngân hàng',
        'momo' => 'Ví momo',
        'cash' => 'Thanh toán khi nhận hàng',
    ];
    return $payment_method_vn[$payment];
}

// Chuyển trạng thái thanh toán sang vn
function payment_status_vn($payment)
{
    $payment_status_vn = [
        'pending' => 'Chờ thanh toán',
        'completed' => 'Thanh toán thành công',
        'failed' => 'Thanh toán thất bại',
        'refunded' => 'Đã hoàn tiền',
        'paid on delivery' => 'Thanh toán khi nhận hàng'
    ];
    return $payment_status_vn[$payment];
}

function order_status_vn($status)
{
    $order_status_vn = [
        'pending' => 'Đang chuẩn bị hàng',
        'processing' => 'Đã xuất kho',
        'shipped' => 'Đang giao hàng',
        'delivered' => 'Nhận hàng thành công',
        'cancelled' => 'Đã hủy',
        'refunded' => 'Đã hoàn tiền'
    ];
    return $order_status_vn[$status];
}

function saveImage($file, $url, $slug)
{
    $slug = $slug ? rtrim($slug, '/') . '/' : '';
    $imageName = time() . '-'. uniqid() .'.' . $file->extension();
    $file->move(public_path($url.'/'.$slug), $imageName);
    $fileUrl = $url . '/' . $slug .$imageName;

    return $fileUrl;
}
