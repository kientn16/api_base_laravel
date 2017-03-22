<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Sample</title>

        {!! Html::style('assets/css/frontend/jquery.fullPage.css') !!}
        {!! Html::script('assets/js/jquery-2.2.3.min.js') !!}
        {!! Html::script('assets/js/frontend/vendors/jquery.easings.min.js') !!}
        {!! Html::script('assets/js/frontend/vendors/scrolloverflow.min.js') !!}
        {!! Html::script('assets/js/frontend/jquery.fullPage.js') !!}
    </head>
    <style type="text/css">
        .img-responsive {
            display: block;
            max-height: 100%;
            width: auto;
        }
        .center-block {
            margin: auto;
        }
        .section {
            max-height: 1536px;
        }
    </style>
    <body>
        <div class="container">
            <div id="fullpage">
                <div class="section center-block" >
                    <img src="/assets/imgs/sample/1.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/2.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/3.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/4.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/5.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/6.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/7.jpg" class="img-responsive center-block">
                </div>
                <div class="section center-block">
                    <img src="/assets/imgs/sample/8.jpg" class="img-responsive center-block">
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage();
        });
    </script>
</html>