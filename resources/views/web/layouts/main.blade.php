<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="/assets/img/common/favicon.ico">
        <!-- ========== style sheet ========== -->
        {!! Html::style('assets/css/frontend/master.min.css') !!}
        {!! Html::style('assets/css/frontend/themify-icons.css') !!}
        {!! Html::style('assets/css/frontend/main.css') !!}
        {!! Html::style('assets/css/frontend/ie7.css') !!}
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                @include('web.elements.header')
                @yield('content')
                @include('web.elements.footer')
            </div>
        </div>
    <!-- ========== script ========== -->
    {!! Html::script('assets/js/jquery-2.2.3.min.js') !!}
    {!! Html::script('assets/js/frontend/training.min.js') !!}
    @yield('script')
</body>
</html>