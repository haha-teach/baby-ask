@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <form class="ask-form" method='post' action="ask">
                標題<br />
                <input class="u-full-width" type="text" name='title'></input><br />
                內容<br />
                <textarea class="u-full-width" name='body'></textarea>
                您的Email（有人回答時，系統會通知您。Email不會在網站上公開。）<br />
                <input class="u-full-width" type="text" name="email"></input><br />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value='送出問題' class="button-primary" />
            </form>
        </div>
        <div class="four columns">
            <div>
                <h5>發問注意事項</h5>
                <ul>
                    <li>請盡量清楚描述您的問題</li>
                    <li>請描述您做過哪些嘗試、試過哪些方法</li>
                    <li>請盡可能地提供細節，幫回答者節省時間</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop