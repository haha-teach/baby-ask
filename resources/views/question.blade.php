@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <h5>{{ $question->title }}</h5>
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            <div><pre>{{ $question->body }}</pre></div>
            <br />
            <div class="time">發問時間：2016-8-3 12:31</div>
            <div style="clear: both;"></div>
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
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
<style>
    .time {
        float: right;
        color: #757575;
    }
</style>
@stop