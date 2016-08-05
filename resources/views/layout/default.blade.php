<html>
    <head>
        <title>程式嬰兒の發問</title>

        <meta property="og:title" content="程式嬰兒の發問"/>
        <meta property="og:description" content="給程式新手發問的問答網站！" />
        <meta property="og:image" content="http://class.turn.tw/wp-content/uploads/2016/07/boy.png" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/skeleton-2.0.4/normalize.css">
        <link rel="stylesheet" href="/css/skeleton-2.0.4/skeleton.css">
        <link rel="stylesheet" href="/css/style.css">
        @yield('head')
    </head>
    <body>
        <div style='background-color: #1abc9c;'>
            <div class="container">
                <div class="row header-box">
                    <br />
                    <a href='/'><h4>程式嬰兒の發問</h4></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <ul class="nav-bar">
                    <li><a href='/'>首頁</a></li>
                    <li><a href='/ask'>我要發問</a></li>
                </ul>
            </div>
        </div>
        @yield('content')
    </body>
</html>