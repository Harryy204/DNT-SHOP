<html>

<head lang="vi">
	<meta charset="utf-8">
	<title>Hóa đơn </title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
		/* reset */

		* {
			border: 0;
			box-sizing: content-box;
			color: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			line-height: inherit;
			list-style: none;
			font-family: "Roboto";
			margin: 0;
			padding: 0;
			text-decoration: none;
			vertical-align: top;
		}

		h1 {
			font: bold 100% "Roboto";
			text-align: center;
			text-transform: uppercase;
		}

		/* table */

		table {
			font-size: 75%;
			table-layout: fixed;
			width: 100%;
		}

		table {
			border-collapse: separate;
			border-spacing: 2px;
		}

		th,
		td {
			border-width: 1px;
			padding: 0.5em;
			position: relative;
			text-align: left;
		}

		th,
		td {
			border-radius: 0.25em;
			border-style: solid;
		}

		th {
			background: #EEE;
			border-color: #BBB;
		}

		td {
			border-color: #DDD;
		}

		/* page */

		html {
			/* font: 16px/1 'Open Sans', sans-serif; */
			overflow: auto;
			padding: 0.5in;
		}

		html {
			background: #999;
			cursor: default;
		}

		body {
			box-sizing: border-box;
			height: 11in;
			margin: 0 auto;
			overflow: hidden;
			padding: 0.5in;
			
		}

		body {
			background: #FFF;
			border-radius: 1px;
			box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		}

		/* header */

		header {
			margin: 0 0 3em;
		}

		header:after {
			clear: both;
			content: "";
			display: table;
		}

		header h1 {
			background: #000;
			border-radius: 0.25em;
			color: #FFF;
			margin: 0 0 1em;
			padding: 0.5em 0;
		}

		header address {
			float: left;
			font-size: 75%;
			font-style: normal;
			line-height: 1.25;
			margin: 0 1em 1em 0;
		}

		header address p {
			margin: 0 0 0.25em;
		}

		header span,
		header img {
			display: block;
			float: right;
		}

		header span {
			margin: 0 0 1em 1em;
			max-height: 25%;
			max-width: 60%;
			position: relative;
		}

		header img {
			max-height: 100%;
			max-width: 100%;
		}

		header input {
			cursor: pointer;
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
			height: 100%;
			left: 0;
			opacity: 0;
			position: absolute;
			top: 0;
			width: 100%;
		}

		/* article */

		article,
		article address,
		table.meta,
		table.inventory {
			margin: 0 0 3em;
		}

		article:after {
			clear: both;
			content: "";
			display: table;
		}

		article h1 {
			clip: rect(0 0 0 0);
			position: absolute;
		}

		article address {
			float: left;
			font-size: 125%;
			font-weight: bold;
		}

		/* table meta & balance */

		table.meta,
		table.balance {
			float: right;
			width: 36%;
		}

		table.meta:after,
		table.balance:after {
			clear: both;
			content: "";
			display: table;
		}

		/* table meta */

		table.meta th {
			width: 40%;
		}

		table.meta td {
			width: 60%;
		}

		/* table items */

		table.inventory {
			clear: both;
			width: 100%;
		}

		table.inventory th {
			font-weight: bold;
			text-align: center;
		}

		/* table balance */

		table.balance th,
		table.balance td {
			width: 50%;
		}

		table.balance td {
			text-align: right;
		}

		/* aside */

		aside h1 {
			border: none;
			border-width: 0 0 1px;
			margin: 0 0 1em;
		}

		aside h1 {
			border-color: #999;
			border-bottom-style: solid;
		}

		/* javascript */

		.add,
		.cut {
			border-width: 1px;
			display: block;
			font-size: .8rem;
			padding: 0.25em 0.5em;
			float: left;
			text-align: center;
			width: 0.6em;
		}

		.add,
		.cut {
			background: #9AF;
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
			background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
			background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
			border-radius: 0.5em;
			border-color: #0076A3;
			color: #FFF;
			cursor: pointer;
			font-weight: bold;
			text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
		}

		.add {
			margin: -2.5em 0 0;
		}

		.add:hover {
			background: #00ADEE;
		}

		.cut {
			opacity: 0;
			position: absolute;
			top: 0;
			left: -1.5em;
		}

		.cut {
			-webkit-transition: opacity 100ms ease-in;
		}

		tr:hover .cut {
			opacity: 1;
		}	

		.row {
			display: flex;
			gap: 20px;
			/* Khoảng cách giữa các cột */
		}

		.col-6 {
			flex: 1;
			/* Mỗi cột chiếm 50% */
		}

		h5 {
			font-size: 16px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		p,
		em {
			font-size: 14px;
			line-height: 1.5;
		}

		em {
			display: block;
			margin-top: 5px;
			font-style: italic;
		}
	</style>
</head>

<body>
	<header>
		<h1>Hoa don mua hang</h1>

		<div class="row">
			<div class="col-6">
				<h5>Thong tin nguoi gui</h5>
				<p><strong>Ho ten:</strong> DNTSHOP</p>
				<em><strong>Dia chi:</strong> Da Nang</em>
			</div>

			<div class="col-6">
				<h5>Thong tin nguoi nhan</h5>
				<p><strong>Ho ten:</strong> {{$order->user->full_name ?? 'Khách hàng đã bị xóa'}}</p>
				<em><strong>Dia chi:</strong> {{$order->user->address ?? 'Khách hàng đã bị xóa'}}</em>
			</div>
		</div>
	</header>
	<article>
		<h1>Thông tin hóa đơn</h1>
		<table class="meta">
			<tr>
				<th><span>Mã hóa đơn</span></th>
				<td><span>{{$order->order_code}}</span></td>
			</tr>
			<tr>
				<th><span>Ngày đặt hàng</span></th>
				<td><span>{{$order->created_at->format('d/m/Y')}}</span></td>
			</tr>
		</table>
		<table class="inventory">
			<thead>
				<tr>
					<th><span>Tên mặt hàng </span></th>
					<th><span>Giá</span></th>
					<th><span>Size</span></th>
					<th><span>Màu</span></th>
					<th><span>Số lượng</span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->order_detail as $detail)
				<tr>
					<td><span>{{$detail->product_variant->products->product_name}}</span></td>
					<td><span>{{number_price($detail->price)}}</span></td>
					<td><span>{{$detail->product_variant->size->size_name ?? 'Không có'}}</span></td>
					<td><span>{{$detail->product_variant->colors->color_name}}</span></td>
					<td><span>{{$detail->quantity}}</span></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table class="balance">
			<tr>
				<th><span>Tổng đơn hàng</span></th>
				<td><span>{{number_price($order->total_amount)}}</span></td>
			</tr>
			<tr>
				<th><span>Được giảm</span></th>
				<td><span>{{(isset($order->promotion_id)) ? number_price(getPromoDiscount($order->promotion->discount_type,$order->promotion->discount_value,$order->total_amount)): 0}}</span></td>
			</tr>
			<tr>
				<th><span>Phí ship</span></th>
				<td><span>{{number_price($order->shipping_fee)}}</span></td>
			</tr>
			<tr>
				<th><span>Số tiền cần thanh toán</span></th>
				<td><span>{{(isset($order->promotion_id)) ? number_price($order->total_amount-getPromoDiscount($order->promotion->discount_type,$order->promotion->discount_value,$order->total_amount)+$order->shipping_fee) : number_price($order->total_amount+$order->shipping_fee)}}</span></td>
			</tr>
		</table>
	</article>
</body>

</html>