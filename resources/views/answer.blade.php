@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <form class="ask-form" method='post' action="/answer">
                Answer<br />
                <textarea class="u-full-width" name='body'></textarea>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <input type="submit" value='Answer' class="button-primary" />
            </form>
        </div>
        <div class="four columns">

        </div>
    </div>
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

        </div>
    </div>
</div>
<style>
    .time {
        float: right;
        color: #757575;
    }
    pre {
        font-size: 17px;
        white-space:pre-wrap;
        word-wrap:break-word;
    }
</style>
@stop