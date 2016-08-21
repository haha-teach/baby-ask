@extends('layout/default')
@section('head')
    <title>轉角遇到 Bug：問問別人怎麼辦</title>

    <meta property="og:title" content="轉角遇到 Bug：問問別人怎麼辦"/>
    <meta property="og:description" content="社群力量解決程式設計問題的問答網站。" />
    <meta property="og:image" content="http://class.turn.tw/wp-content/uploads/2016/07/boy.png" />
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <h5 style="margin-bottom: 5px;">最新問題</h5>
            @foreach($questions as $question)
            <div class="question-box">
                <div class="info-list">
                    <div class="info-box">
                        <div class="label">{{ $question->answers->count() }}</div>
                        <div class="value">回答</div>
                    </div>
                    <div class="info-box">
                        <div class="label">{{ $question->pageview }}</div>
                        <div class="value">瀏覽</div>
                    </div>
                </div>
                <div class="summary-box">
                    <div class="title"><a href='/question/{{$question->id}}'>{{ $question->title }}</a></div>
                    <div class="tag-box">
                    @foreach($question->tags as $tag)
                        <div class="tag">
                            {{ $tag->name }}
                        </div>
                    @endforeach
                    </div>
                    <div class="time">發問時間：{{ $question->created_at->format('Y-m-d H:i') }}</div>
                    <div style="clear: both;"></div>
                </div>
                <div style="clear: both;"></div>
            </div>
            @endforeach
        </div>
        <div class="four columns">
            <div>
                @include('_ask-rule')

                <h5>熱心人士</h5>
                <div class="top-members">
                @foreach($users as $user)
                <div class="member-box">
                    <img class='photo' src='{{$user->getAvatar()}}' />
                    <div class="info">
                        <div class="name">{{$user->name}}</div>
                        <div class="reputation"><img class="heart" src='/images/heart.png' />{{$user->reputation}}</div>
                    </div>
                </div>
                @endforeach
                </div>
                <style>
                    .member-box {
                        background-color: #E8F5E9;
                        padding: 5px 10px;
                        margin-bottom: 10px;
                    }
                </style>
                <!--
                <h5>本月聲望排行</h5>
                <ul>
                    @foreach($users as $user)
                    <li>{{$user->name}} ( {{$user->reputation}} 分 )</li>
                    @endforeach
                </ul>
                -->
            </div>
        </div>
    </div>
</div>

<style>
    .question-box {
        border-top: 1px solid #e9e9e9;
        padding-top: 10px;
        padding-bottom: 10px;
        position: relative;
    }
    .question-box > .title {
        margin-bottom: 10px;
    }
    .question-box .time {
        color: #757575;
        float: right;
    }
    .info-list {
        float: left;
        width: 120px;
    }
    .info-box {
        display: inline-block;
        text-align: center;
        padding: 5px 10px;
        color: #616161;
    }
    .info-box > .label {

    }
    .info-box > .value {

    }
    .summary-box {
        float: left;
        width: calc(100% - 120px);
    }
    .tag-box {
        float: left;
        padding-top: 5px;
    }
</style>
@stop