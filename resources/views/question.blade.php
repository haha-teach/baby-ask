@extends('layout/default')
@section('head')
    <title>{{$question->title}}</title>

    <meta property="og:title" content="{{$question->title}}"/>
    <meta property="og:description" content="{{mb_substr($question->body,0,100,"UTF-8")}}" />
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <h5>{{ $question->title }}</h5>
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            <div><pre>{{ $question->body }}</pre></div>
            <br />
            <div class="tag-box">
            @foreach($question->tags as $tag)
                <div class="tag">
                    {{ $tag->name }}
                </div>
            @endforeach
            </div>

            <div class="asktime">發問時間：{{$question->created_at->format('Y-m-d H:i')}}</div>
            <div style="clear: both;"></div>
            <hr style='margin-top: 20px; margin-bottom: 0px; margin-left: 60px;'/>
            @foreach($question->comments as $comment)
                @include('_comment')
            @endforeach
            <a style="margin-left: 60px; padding-top: 10px; display: block;" href='/comment/question/{{$question->id}}'>新增推文</a>

            <!--
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            -->
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
    <div class="row">
        <br />
        <div style="font-size: 36px;">{{$question->answers->count()}} 個回答</div>
    </div>
    @if($question->answers->count() === 0)
    <div class="row">
        <hr style='margin-top: 0px; margin-bottom: 20px;'/>
        <div><pre>還沒有人回答唷！</pre></div>
    </div>
    @endif

    @foreach($question->answers as $answer)
    <div class="row">
        <div class="eight columns">
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            <div style="float: left; width: 60px;">

                <div class="score-box">
                    <a href='/vote/{{$answer->id}}'><div class="up"></div></a>
                    <div class="number">{{$answer->upvote_count}}</div>
                </div>
                <style>
                    .score-box {
                        text-align: center;
                        width: 40px;
                    }
                    .score-box .up {
                      width: 0;
                      height: 0;

                      margin: 0 auto;

                      border-left: 15px solid transparent;
                      border-right: 15px solid transparent;

                      border-bottom: 15px solid #757575;

                      margin-top: 10px;
                    }
                    .score-box > .number {
                        color: #757575;
                        text-align: center;
                        font-size: 22px;
                        margin-top: 10px;
                    }
                </style>

            </div>

            <div><pre>{{ $answer->body }}</pre></div>
            <br />
            <div class="info-box">
                <div class="time">回答時間：{{$answer->created_at->format('Y-m-d H:i')}}</div>
                <div class="name">回答之人：{{$answer->user->name}}</div>
            </div>
            <div style="clear: both;"></div>
            <hr style='margin-top: 20px; margin-bottom: 0px; margin-left: 60px;'/>
            @foreach($answer->comments as $comment)
                @include('_comment')
            @endforeach
            <a style="margin-left: 60px; padding-top: 10px; display: block;" href='/comment/answer/{{$answer->id}}'>新增推文</a>

            <!--
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            -->
            <br />
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="eight columns">
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            <!--
            <hr style='margin-top: 0px; margin-bottom: 20px;'/>
            -->
            <br />
            <a href='/answer/{{$question->id}}'><h1 style="margin-left: 0px;">我要回答這個問題！</h1></a>
            <br />
            <br />
        </div>
    </div>

</div>
<style>
    .asktime {
        float: right;
        color: #757575;
    }
    .info-box {
        float: right;
    }
    .time {
        color: #757575;
    }
    .name {

    }
    pre {
        margin-left: 60px;
        font-size: 17px;
        white-space:pre-wrap;
        word-wrap:break-word;
    }
    .tag-box {
        margin-left: 60px;
    }
</style>
@stop