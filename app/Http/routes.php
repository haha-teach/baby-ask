<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $questions = App\Question::all()->reverse();

    return view('index', ['questions' => $questions]);
});

Route::get('/ask', function () {
    if (!Auth::check()) {
        return Redirect::to('/login');
    }

    return view('ask');
});

Route::post('/ask', function () {
    $q = new App\Question();

    $q->title = Input::get('title');

    $q->body = Input::get('body');

    $q->user_id = Auth::user()->id;

    $q->save();

    return Redirect::to('/');
});

Route::get('/question/{id}', function ($id) {
    $question = App\Question::find($id);

    $question->pageview += 1;

    $question->save();

    return view('question', ['question' => $question]);
});

Route::get('/answer/{id}', function ($id) {
    if (!Auth::check()) {
        return Redirect::to('/login');
    }

    $question = App\Question::find($id);

    return view('answer', ['question' => $question]);
});

Route::post('/answer', function () {
    $a = new App\Answer();

    $a->question_id = Input::get('question_id');

    $a->body = Input::get('body');

    $a->user_id = Auth::user()->id;

    $a->save();

    return Redirect::to('/');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/comment/{type}/{id}', function ($type, $id) {
    if (!Auth::check()) {
        return Redirect::to('/login');
    }

    if ($type === 'question') {
        $question = App\Question::find($id);

        $answer = null;
    } else if ($type === 'answer') {
        $question = null;

        $answer = App\Answer::find($id);
    } else {
        dd('Fail fast.');
    }

    return view('comment', ['question' => $question, 'answer' => $answer]);
});

Route::post('/comment', function () {
    $c = new App\Comment();

    if (Input::get('question_id')) {
        $c->question_id = Input::get('question_id');
    }

    if (Input::get('answer_id')) {
        $c->answer_id = Input::get('answer_id');
    }

    $c->body = Input::get('body');

    $c->user_id = Auth::user()->id;

    $c->save();

    return Redirect::to('/');
});