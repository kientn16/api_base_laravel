<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="/assets/img/common/favicon.ico">
        <!-- ========== style sheet ========== -->
        {!! Html::style('assets/css/admin/master.min.css') !!}
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                @include('admin.elements.header')
                @yield('content')
            </div>
            @include('admin.elements.right_sidebar')
        </div>
        <!-- ========== script ========== -->
        {!! Html::script('assets/js/jquery-2.2.3.min.js') !!}
        {!! Html::script('assets/js/admin/common.min.js') !!}
        {!! Html::script('assets/js/admin/elastic.min.js') !!}
        {!! Html::script('assets/js/admin/modal.min.js') !!}
        {!! Html::script('assets/js/admin/table.min.js') !!}
        @yield('script')
    </body>
</html>