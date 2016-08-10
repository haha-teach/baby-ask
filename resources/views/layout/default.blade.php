<html>
    <head>

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
                    <a href='/'><h4 style="font-size: 24px; padding-top: 10px; padding-bottom: 10px; margin-bottom: 0;">轉個彎方案<span style="color: black; font-size: 16px; padding-left: 15px;" >利用社群力量解決寫程式的問題</span></h4></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <ul class="nav-bar">
                    <li><a href='/'>逛逛首頁</a></li>
                    <li><a href='/ask'>我要發問</a></li>
                    @if(Auth::check())
                    <li><a href='/faq-reputation'>您的聲望：{{Auth::user()->reputation}}</a></li>
                    <li><a href='/logout'>我要登出</a></li>
                    @else
                    <li><a href='/faq-reputation'>聲望系統</a></li>
                    <li><a href='/login'>我要登入</a></li>
                    <li><a href='/register'>我要註冊</a></li>
                    @endif
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