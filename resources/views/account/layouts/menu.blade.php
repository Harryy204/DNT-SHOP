<ul class="account-nav">
    @if(Auth::user()->isAdmin())
    <li><a href="{{route('admin.dashboard')}}" class="menu-link menu-link_us-s">Quản trị viên</a></li>
    @endif
    <li><a href="{{route('account')}}" class="menu-link menu-link_us-s {{Route::currentRouteName() === 'account' ? 'menu-link_active': ''}}">Thông tin</a></li>
    <li><a href="{{route('account.order')}}" class="menu-link menu-link_us-s {{Str::is(['account.order*'],Route::currentRouteName())? 'menu-link_active': ''}}">Đơn hàng của bạn</a></li>
    <li>
        <span class="menu-link menu-link_us-s" style="cursor:pointer ;" onclick="event.defaultPrevented;document.getElementById('logout').submit()">Đăng xuất</span>
    </li>

    <form action="{{route('logout')}}" method="post" hidden id="logout">
        @csrf
    </form>
</ul>