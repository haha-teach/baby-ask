@extends('layout/default')

@section('content')
<div class="container">
    <div class="row">
        <div class="eight columns">
            <form class="ask-form" method='post' action="/vote">
                給予好評<br />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                <input type="submit" value='送出好評' class="button-primary" onclick="if ( confirm('確定送出？') ) { this.disabled=true; this.value='處理中，請稍候...'; this.form.submit(); }else{return false;};" />
            </form>
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