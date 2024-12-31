@extends('layouts.layout')
@section('title','Trang chủ')
@push('styles')
@endpush
@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
        <div class="mw-930">
            <h2 class="page-title">Giới thiệu về chúng tôi</h2>
        </div>

        <div class="about-us__content pb-5 mb-5">
            <p class="mb-5">
                <img loading="lazy" class="w-100 h-auto d-block" src="/assets/client/images/about/about-1.jpg" width="1410"
                    height="550" alt="" />
            </p>
            <div class="mw-930">
                <h3 class="mb-4">Giới thiệu đôi chút</h3>
                <p class="fs-6 fw-medium mb-4">Chào mừng bạn đến với <strong>DNTShop</strong> – điểm đến lý tưởng cho những tín đồ yêu thời trang và tìm kiếm phong cách riêng. Tại <strong>DNTShop</strong>, chúng tôi tin rằng thời trang không chỉ là quần áo, mà còn là ngôn ngữ thể hiện cá tính, sự tự tin và phong cách sống.</p>
                <p class="mb-4">
                    Hơn cả một cửa hàng thời trang, <strong>DNTShop</strong> là nơi bạn có thể khám phá, thử nghiệm và thể hiện chính mình. Đội ngũ nhân viên tận tâm của chúng tôi luôn sẵn sàng hỗ trợ, tư vấn để bạn có những lựa chọn hoàn hảo nhất.
                </p>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="mb-3">Sứ mệnh</h5>
                        <p class="mb-3">Sứ mệnh của chúng tôi là mang đến cho bạn những sản phẩm chất lượng, từ trang phục hàng ngày đến những bộ cánh đặc biệt cho các dịp quan trọng. Chúng tôi luôn cập nhật những xu hướng mới nhất, kết hợp với phong cách độc đáo để mang lại sự đa dạng cho mọi phong cách – từ thanh lịch, nữ tính đến cá tính, hiện đại.</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-3">Niềm tự hào</h5>
                        <p class="mb-3"><strong>DNTShop</strong> tự hào về sự tinh tế trong từng sản phẩm, từ chất liệu mềm mại, đường may tỉ mỉ, đến thiết kế sáng tạo. Mỗi món đồ tại cửa hàng đều được chọn lựa kỹ lưỡng, nhằm mang lại trải nghiệm mua sắm tuyệt vời cho khách hàng.</p>
                    </div>
                </div>
            </div>
            <div class="mw-930 d-lg-flex align-items-lg-center">
                <div class="image-wrapper col-lg-6">
                    <img class="h-auto" loading="lazy" src="/assets/client/images/about/about-1.jpg" width="450" height="500" alt="">
                </div>
                <div class="content-wrapper col-lg-6 px-lg-4">
                    <h5 class="mb-3">Hành Trình Biến Hóa Phong Cách</h5>
                    <p>Linh, một cô gái đam mê thời trang, bước vào DNTShop với mong muốn làm mới phong cách. Cô chọn cho mình một chiếc váy maxi dịu dàng, kết hợp cùng đôi boots da cá tính và túi xách nhỏ xinh. Mỗi bước chân trên phố, Lan cảm nhận được sự tự tin và cái nhìn ngưỡng mộ từ mọi người xung quanh.</p>
                    <em>DNTShop – Nơi khơi nguồn hành trình phong cách của bạn!</em>
                </div>
            </div>
            <div class="mw-930">
                <h3 class="mb-4">Hành trình phát triển</h3>
                <p class="mb-2">Từ những ngày đầu thành lập, <strong>DNTShop</strong> đã khởi đầu với niềm đam mê mãnh liệt dành cho thời trang và mong muốn mang đến những sản phẩm chất lượng nhất cho khách hàng. Chúng tôi bắt đầu từ một cửa hàng nhỏ,
                    với những bộ sưu tập đơn giản nhưng đầy phong cách, đáp ứng nhu cầu cơ bản của người tiêu dùng.</p>
                <p class="mb-4">Giai đoạn khởi đầu không dễ dàng, nhưng nhờ sự ủng hộ nhiệt tình từ khách hàng, <strong>DNTShop</strong> dần khẳng định vị thế trong lòng người tiêu dùng. Mỗi phản hồi, mỗi lời khen ngợi và cả những góp ý chân thành đều là động lực để chúng tôi không ngừng cải thiện và phát triển.</p>
                <p>Sau nhiều năm không ngừng nỗ lực, <strong>DNTShop</strong> đã mở rộng hệ thống cửa hàng, phát triển thêm kênh bán hàng trực tuyến, giúp khách hàng dễ dàng tiếp cận với những bộ sưu tập mới nhất mọi lúc, mọi nơi. Chúng tôi không chỉ chú trọng vào việc đa dạng hóa sản phẩm mà còn đầu tư vào trải nghiệm mua sắm của khách hàng, từ không gian cửa hàng đến dịch vụ khách hàng chuyên nghiệp.</p>
                <p>Dấu ấn đáng nhớ trên hành trình của chúng tôi là việc hợp tác với các nhà thiết kế trẻ tài năng, mang lại những bộ sưu tập độc quyền và sáng tạo, giúp <strong>DNTShop</strong> trở thành nơi thể hiện phong cách cá nhân cho mọi người.</p>
                <p>Hiện nay, <strong>DNTShop</strong> tự hào trở thành một thương hiệu thời trang được nhiều khách hàng yêu thích và tin tưởng. Chúng tôi tiếp tục hành trình của mình bằng cách đổi mới, sáng tạo và không ngừng phấn đấu để mang đến những giá trị tốt nhất cho cộng đồng yêu thời trang.</p>
                <p>Tương lai của <strong>DNTShop</strong> là một tầm nhìn đầy hứa hẹn. Chúng tôi sẽ không ngừng mở rộng, cải tiến và đồng hành cùng khách hàng trên hành trình khám phá và khẳng định phong cách cá nhân. <strong>DNTShop</strong> luôn cam kết giữ vững giá trị cốt lõi – đó là chất lượng, sự sáng tạo và dịch vụ tận tâm.</p>
                <em>Cảm ơn bạn đã là một phần quan trọng trong hành trình của chúng tôi. <strong>DNTShop</strong> – Nơi phong cách bắt đầu và lan tỏa!</em>
            </div>
        </div>
    </section>


</main>
@endsection