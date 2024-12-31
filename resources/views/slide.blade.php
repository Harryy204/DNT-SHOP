<section class="swiper-container js-swiper-slider swiper-number-pagination slideshow custom-swiper-slider" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
        <div class="swiper-slide">
            <div class="overflow-hidden position-relative h-100">
                <div class="slideshow-character position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img loading="lazy" src="{{ $banner->image_url }}"
                        class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-100 h-80 opacity-0" />
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="container">
        <div class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5"></div>
        <div class="swiper-button-prev" style="color: white;"></div>
        <div class="swiper-button-next" style="color: white;"></div>
    </div>
</section>