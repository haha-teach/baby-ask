@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <h5>{{ $question->title }}</h5>
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            <div><pre>{{ $question->body }}</pre></div>
            <br />
            <div class="asktime">發問時間：{{$question->created_at->format('Y-m-d H:i')}}</div>
            <div style="clear: both;"></div>
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
        <h3>回答</h3>
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
            <hr style='margin-top: 0px; margin-bottom: 20px;'/>
            <div><pre>{{ $answer->body }}</pre></div>
            <br />
            <div class="info-box">
                <div class="time">回答時間：{{$answer->created_at->format('Y-m-d H:i')}}</div>
                <div class="name">回答之人：{{$answer->user->name}}</div>
            </div>
            <div style="clear: both;"></div>
            <!--
            <hr style='margin-top: 20px; margin-bottom: 20px;'/>
            -->
            <br />
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="eight columns">
            <hr style='margin-top: 0px; margin-bottom: 20px;'/>
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
        margin-left: 40px;
        font-size: 17px;
        white-space:pre-wrap;
    }
</style>
@stop