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

    return view('welcome', ['questions' => $questions]);
});

Route::get('/ask', function () {
    return view('ask');
});

Route::post('/ask', function () {
    $q = new App\Question();

    $q->title = Input::get('title');

    $q->body = Input::get('body');

    $q->email = Input::get('email');

    $q->save();

    return Redirect::to('/');
});

Route::get('/question/{id}', function ($id) {
    $question = App\Question::find($id);

    return view('question', ['question' => $question]);
});

Route::get('/answer/{id}', function ($id) {
    $question = App\Question::find($id);

    return view('answer', ['question' => $question]);
});