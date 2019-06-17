<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>title</title>
        <style>
            .header{
                height:100px;background:darkred;color:white;
            }
            .middle{
                height:300px;background:darkcyan;color:white;
            }
            .footer{
                height:100px;background:gray;color:white;
            }
        </style>
    </head>
    <body>
        @include('common.header', ['page'=>'文章頁面'])
        <div class="middle">我是文章中間</div>
        @include('common.footer')
    </body>
</html>
