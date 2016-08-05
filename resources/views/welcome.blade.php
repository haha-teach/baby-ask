@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <h5>最新問題</h5>
            @foreach($questions as $question)
            <div class="question-box">
                <div class="title"><a href='#'>{{ $question->title }}</a></div>
                <div class="time">發問時間：{{ $question->created_at->format('Y-m-d H:i') }}</div>
                <div style="clear: both;"></div>
            </div>
            @endforeach
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
    .question-box {
        border-top: 1px solid #e9e9e9;
        padding: 15px;
        position: relative;
    }
    .question-box > .title {
        margin-bottom: 10px;
    }
    .question-box > .time {
        color: #757575;
        float: right;
    }
</style>
@stop