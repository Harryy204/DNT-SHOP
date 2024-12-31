<div class="section-menu-left">
    <div class="box-logo">
        <a href="/" id="site-logo-inner" style="height: 75px;">
            <img class="" id="logo_header" alt="" src="images/logo/logo.png"
                data-light="images/logo/logo.png" data-dark="images/logo/logo.png">
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="center">
        <div class="center-item">
            <div class="center-heading">Quản trị</div>
            <ul class="menu-list">
                <li class="menu-item {{Route::currentRouteName() === 'admin.dashboard' ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}" class="">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">Góp Ý Và Phản Hồi</div>
            <ul class="menu-list">
                <li class="menu-item {{Str::is(['admin.contacts*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="{{route('admin.contacts')}}" class="">
                        <div class="icon"><i class="icon-mail {{Str::is(['admin.contacts*'],Route::currentRouteName())? 'text-primary': ''}}"></i></div>
                        <div class="text {{Str::is(['admin.contacts*'],Route::currentRouteName())? 'text-primary': ''}}">
                            Góp Ý Phản Hồi
                            @if($newMessagesCount)
                            <span class="badge badge-danger" style="color: white; background-color: red; border-radius: 50%; font-size: 12px; position: absolute; right: 15px;">
                                {{ $newMessagesCount ?? 0 }}
                            </span>
                            @endif
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">Người dùng</div>
            <ul class="menu-list">
                <li class="menu-item has-children {{Str::is(['*user*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-users"></i></div>
                        <div class="text">Người dùng</div>
                    </a>
                    <ul class="sub-menu ">
                        <li class="sub-menu-item ">
                            <a href="{{route('admin.user.add')}}" class="">
                                <div class="text {{Str::is(['*user.add*'],Route::currentRouteName())? 'text-primary': ''}}">Thêm mới</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('admin.user') }}" class="">
                                <div class="text {{Str::is(['*user'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{Str::is(['*banner*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-image"></i></div>
                        <div class="text">Banner</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('admin.banner.add')}}" class="">
                                <div class="text {{Str::is(['*banner.add*'],Route::currentRouteName())? 'text-primary': ''}}">Thêm mới</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('admin.banner') }}" class="">
                                <div class="text {{Str::is(['*banner'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">Bài viết</div>
            <ul class="menu-list">
                <li class="menu-item has-children {{Str::is(['*tag*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-tag"></i></div>
                        <div class="text">Thẻ bài viết</div>
                    </a>
                    <ul class="sub-menu">
                        {{-- <li class="sub-menu-item">
                            <a href="{{route('tag.create')}}" class="">
                                <div class="text {{Str::is(['*tag.create*'],Route::currentRouteName())? 'text-primary': ''}}">Thêm mới</div>
                            </a>
                        </li> --}}
                        <li class="sub-menu-item">
                            <a href="{{route('tag')}}" class="">
                                <div class="text {{Str::is(['*tag'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{Str::is(['*post*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-file-plus"></i></div>
                        <div class="text">Bài viết</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('post.create')}}" class="">
                                <div class="text {{Str::is(['*post.create*'],Route::currentRouteName())? 'text-primary': ''}}">Thêm mới</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('post')}}" class="">
                                <div class="text {{Str::is(['*post'],Route::currentRouteName())? 'text-primary': ''}}">Liệt kê</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{Str::is(['*comment*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-message-circle"></i></div>
                        <div class="text">Bình luận</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('comments.index') }}" class="">
                                <div class="text {{Str::is(['*comment*'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">Sản phẩm</div>
            <ul class="menu-list">
                <li class="menu-item has-children {{Str::is(['*categories*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Danh mục</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('admin.categories.add')}}" class="">
                                <div class="text {{Str::is(['*categories.add*'],Route::currentRouteName())? 'text-primary': ''}}">Thêm mới</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('admin.categories') }}" class="">
                                <div class="text {{Str::is(['*categories'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{Str::is(['*brands*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-shopping-bag"></i></div>
                        <div class="text">Thương hiệu</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('brands.index')}}" class="">
                                <div class="text {{Str::is(['*brands.index'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{Str::is(['product.color', 'product.size', 'admin.product', 'product.add', 'product.edit'], Route::currentRouteName()) ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-package"></i></div>
                        <div class="text">Sản phẩm</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('product.color')}}">
                                <div class="text {{Str::is(['product.color'], Route::currentRouteName()) ? 'text-primary' : ''}}">Màu sắc</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('product.size')}}">
                                <div class="text {{Str::is(['product.size'], Route::currentRouteName()) ? 'text-primary' : ''}}">Kích thước</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('admin.product')}}">
                                <div class="text {{Str::is(['product.add', 'product.edit', 'admin.product'], Route::currentRouteName()) ? 'text-primary' : ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="menu-item has-children {{Str::is(['product.rate'], Route::currentRouteName()) ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-star"></i></div>
                        <div class="text">Đánh giá</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('product.rate') }}" class="">
                                <div class="text {{Str::is(['product.rate'], Route::currentRouteName()) ? 'text-primary' : ''}}">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">voucher</div>
            <ul class="menu-list">
                <li class="menu-item has-children {{Str::is(['*promotions*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-activity"></i></div>
                        <div class="text">Mã giảm giá </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{route('promotions.create')}}" class="">
                                <div class="text {{Str::is(['*promotions.create*'],Route::currentRouteName())? 'text-primary': ''}}">Thêm mới</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{route('promotions.index') }}" class="">
                                <div class="text {{Str::is(['*promotions.index'],Route::currentRouteName())? 'text-primary': ''}}">Danh sách</div>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">Đơn hàng</div>
            <ul class="menu-list">
                <li class="menu-item {{Str::is(['admin.order*'],Route::currentRouteName())? 'active': ''}}">
                    <a href="{{route('admin.order')}}" class="">
                        <div class="icon "><i class="icon-shopping-cart {{Str::is(['admin.order*'],Route::currentRouteName())? 'text-primary': ''}}"></i></div>
                        <div class="text {{Str::is(['admin.order*'],Route::currentRouteName())? 'text-primary': ''}}">Đơn hàng</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <div class="center-heading">Khác</div>
            <ul class="menu-list">
                <li class="menu-item ">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                        <a type="" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">
                            <div class="icon"><i class="icon-log-out"></i></div>
                            <div class="text">Đăng xuất</div>
                        </a>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</div>