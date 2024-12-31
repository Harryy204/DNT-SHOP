@extends('layouts.layout')

@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <!-- <h2 class="page-title">@yield('title-account','Tài khoản của tôi')</h2> -->
        <div class="row">
            <div class="{{Str::is(['account.order*'],Route::currentRouteName()) ? 'col-lg-2' : 'col-lg-3'}}">
                @include('account.layouts.menu')
            </div>
            <div class="{{Str::is(['account.order*'],Route::currentRouteName()) ? 'col-lg-10' : 'col-lg-9'}}">
                @yield('content-account')
            </div>
        </div>
    </section>
</main>
@endsection