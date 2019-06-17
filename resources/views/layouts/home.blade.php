<!doctype html>
<html lang="en">
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
        <div class="header">我是公共頭部</div>
        @section('content')
        <p>我是主模板的內容</p>
        @show
        <div class="footer">我是公共尾部</div>    
    </body>
</html>
