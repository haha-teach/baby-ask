<html>
    <head>
        <title>轉個彎方案：解決寫程式的各種問題</title>

        <meta property="og:title" content="轉個彎方案：解決寫程式的各種問題"/>
        <meta property="og:description" content="協助人們解決程式設計各種問題的問答網站。" />
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
                    <a href='/'><h4>轉個彎方案<span style="color: black; font-size: 18px; padding-left: 15px;" >解決寫程式的各種問題</span></h4></a>
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

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-47793723-3', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>