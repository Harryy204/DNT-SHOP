@extends('layouts.layout')
@section('main')
    <style>
        .privacy-container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            box-sizing: border-box
        }
        .privacy-nav {
            width: 250px;
            padding: 20px;
            position: sticky;
            top: 20px;
            height: calc(100vh - 40px);
            overflow-y: auto;
            text-transform: uppercase;
        }
        .privacy-nav a {
            color: #555658;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background 0.3s;
            text-transform: uppercase;
        }
        .privacy-nav a:hover, .privacy-nav a.active {
            background: rgba(0, 0, 0, 0.1);
        }
        .privacy-content {
            padding: 20px;
            flex-grow: 1;
        }
        h2 {
            color: #787878;
            margin-top: 30px;
            text-transform: uppercase;
        }
        p, ul {
            color: #555;
            line-height: 1.6;
            max-width: 800px;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
    </style>

    <header>
        <img src="https://manhinhquangcao247.com/media/lib/04-03-2021/chinh-sach-bao-mat-thong-tin-khach-hang.png" alt="Chính Sách Bảo Mật">
    </header>

    <div class="privacy-container">
        <nav class="privacy-nav">
            <h3>Nội dung</h3>
            <a href="#thong-tin-chung">Thông Tin Chung</a>
            <a href="#muc-dich-su-dung">Sử Dụng Thông Tin</a>
            <a href="#bao-mat-thong-tin">Bảo Mật Thông Tin</a>
            <a href="#chia-se-thong-tin">Chia Sẻ Thông Tin</a>
            <a href="#quyen-loi">Quyền Lợi Của Bạn</a>
            <a href="#lien-he">Liên Hệ Với Chúng Tôi</a>
        </nav>

        <div class="privacy-content">
            <p>Chào mừng bạn đến với trang <strong>Chính Sách Bảo Mật</strong> của chúng tôi. Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn khi bạn sử dụng website bán thời trang của chúng tôi. Dưới đây là thông tin chi tiết về cách chúng tôi thu thập, sử dụng và bảo vệ dữ liệu của bạn.</p>

            <h2 id="thong-tin-chung">1. Thông Tin Chúng Tôi Thu Thập</h2>
            <p>Chúng tôi có thể thu thập các loại thông tin sau:</p>
            <ul>
                <li><strong>Thông tin cá nhân:</strong> Tên, địa chỉ email, số điện thoại, địa chỉ giao hàng, và bất kỳ thông tin nào bạn cung cấp khi đăng ký tài khoản hoặc thực hiện giao dịch.</li>
                <li><strong>Thông tin thanh toán:</strong> Thông tin thẻ tín dụng, tài khoản ngân hàng và các thông tin khác cần thiết để xử lý thanh toán.</li>
                <li><strong>Dữ liệu hành vi:</strong> Thông tin về cách bạn tương tác với website, như trang đã xem, thời gian truy cập, và cách bạn tìm thấy website của chúng tôi.</li>
                <li><strong>Thông tin từ cookies:</strong> Chúng tôi sử dụng cookies để nâng cao trải nghiệm người dùng và thu thập dữ liệu phân tích.</li>
            </ul>

            <h2 id="muc-dich-su-dung">2. Mục Đích Sử Dụng Thông Tin</h2>
            <p>Thông tin của bạn có thể được sử dụng cho các mục đích sau:</p>
            <ul>
                <li><strong>Xử lý đơn hàng:</strong> Để xác nhận, giao hàng và chăm sóc khách hàng sau khi mua.</li>
                <li><strong>Cải thiện dịch vụ:</strong> Để phân tích nhu cầu của khách hàng và cải tiến trải nghiệm mua sắm.</li>
                <li><strong>Gửi thông tin:</strong> Cập nhật về sản phẩm mới, khuyến mãi và thông tin khác liên quan đến website của chúng tôi.</li>
                <li><strong>Đảm bảo an toàn:</strong> Để phát hiện và ngăn chặn gian lận hoặc các hành vi bất hợp pháp khác.</li>
            </ul>

            <h2 id="bao-mat-thong-tin">3. Bảo Mật Thông Tin</h2>
            <p>Chúng tôi thực hiện các biện pháp bảo mật sau để bảo vệ thông tin của bạn:</p>
            <ul>
                <li><strong>Mã hóa dữ liệu:</strong> Sử dụng công nghệ mã hóa để bảo vệ thông tin thanh toán và dữ liệu nhạy cảm.</li>
                <li><strong>Quy trình kiểm soát truy cập:</strong> Chỉ cho phép nhân viên có thẩm quyền truy cập vào thông tin cá nhân.</li>
                <li><strong>Đánh giá an ninh định kỳ:</strong> Thực hiện kiểm tra và cập nhật hệ thống bảo mật để đảm bảo thông tin của bạn luôn được bảo vệ.</li>
            </ul>

            <h2 id="chia-se-thong-tin">4. Chia Sẻ Thông Tin</h2>
            <p>Chúng tôi không chia sẻ thông tin cá nhân của bạn với bên thứ ba mà không có sự đồng ý của bạn, trừ khi cần thiết cho:</p>
            <ul>
                <li><strong>Cung cấp dịch vụ:</strong> Chia sẻ với đối tác vận chuyển hoặc thanh toán để hoàn thành đơn hàng của bạn.</li>
                <li><strong>Yêu cầu pháp lý:</strong> Khi có yêu cầu từ cơ quan chức năng hoặc để bảo vệ quyền lợi của chúng tôi.</li>
                <li><strong>Quảng cáo và tiếp thị:</strong> Nếu bạn đồng ý, chúng tôi có thể chia sẻ thông tin với đối tác quảng cáo để cung cấp thông tin và ưu đãi cho bạn.</li>
            </ul>

            <h2 id="quyen-loi">5. Quyền Lợi Của Bạn</h2>
            <p>Bạn có quyền:</p>
            <ul>
                <li><strong>Truy cập thông tin:</strong> Yêu cầu xem thông tin cá nhân mà chúng tôi đang lưu giữ.</li>
                <li><strong>Sửa đổi thông tin:</strong> Cập nhật hoặc sửa đổi thông tin của bạn khi có thay đổi.</li>
                <li><strong>Xóa thông tin:</strong> Yêu cầu xóa thông tin cá nhân của bạn trong một số trường hợp nhất định.</li>
                <li><strong>Phản đối việc xử lý thông tin:</strong> Bạn có quyền phản đối việc chúng tôi xử lý thông tin cá nhân của bạn vì lý do liên quan đến tình huống cụ thể.</li>
                <li><strong>Chuyển nhượng thông tin:</strong> Bạn có quyền yêu cầu chúng tôi chuyển nhượng thông tin của bạn cho bên thứ ba mà bạn chỉ định.</li>
            </ul>

            <h2 id="lien-he">6. Liên Hệ Với Chúng Tôi</h2>
            <p>Nếu bạn có bất kỳ câu hỏi nào về <strong>Chính Sách Bảo Mật</strong> này, vui lòng liên hệ với chúng tôi qua:</p>
            <ul>
                <li>Email: contact@dntshop.com</li>
                <li>Số điện thoại: 0123-456-789</li>
                <li>Địa chỉ: 116 Nguyễn Huy Tưởng, Hoà An, Liên Chiểu, Đà Nẵng 550000, Việt Nam</li>
            </ul>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const links = document.querySelectorAll('nav a');
        const sections = document.querySelectorAll('h2');

        window.addEventListener('scroll', () => {
            let current = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;

                if (pageYOffset >= sectionTop - sectionHeight / 3) {
                    current = section.getAttribute('id');
                }
            });

            links.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('active');
                }
            });
        });
    </script>
@endpush
