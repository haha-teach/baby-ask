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

    $users = App\User::where('reputation', '>', 0)->get();

    $users = $users->sortByDesc('reputation');

    return view('index', ['questions' => $questions, 'users' => $users]);
});

Route::get('/faq-reputation', function () {
    return view('faq-reputation');
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

    Auth::user()->reputation += 2;

    Auth::user()->save();

    Mail::send('emails.someone-answered', ['answer' => $a], function ($m) use ($a) {
        $m->to($a->question->user->email, $a->question->user->name)->subject('Re: ' . $a->question->title);
    });

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

    if (Input::get('question_id')) {
        $question = App\Question::find(Input::get('question_id'));

        if (Auth::user()->id !== $question->user->id) {
            Mail::send('emails.someone-commented', ['question' => $question], function ($m) use ($question) {
                $m->to($question->user->email, $question->user->name)->subject('有人給了您一則推文留言');
            });
        }

        return Redirect::to('/question/' . $question->id);
    }

    if (Input::get('answer_id')) {
        $answer = App\Answer::find(Input::get('answer_id'));

        if (Auth::user()->id !== $answer->user->id) {
            Mail::send('emails.someone-commented', ['question' => $answer->question], function ($m) use ($answer) {
                $m->to($answer->user->email, $answer->user->name)->subject('有人給了您一則推文留言');
            });
        }

        return Redirect::to('/question/' . $answer->question->id);
    }

});

Route::get('/vote/{id}', function ($id) {
    if (!Auth::check()) {
        return Redirect::to('/login');
    }

    $answer = App\Answer::find($id);

    if ($answer->user->id === Auth::user()->id) {
        return view('message', ['message' => '您不能給予自己的回答好評。']);
    }

    $vote = App\Vote::where('answer_id', $answer->id)->where('user_id', Auth::user()->id)->first();

    if ($vote) {
        return view('message', ['message' => '同一個回答，您只能給予一次好評。']);
    }

    return view('vote', ['answer' => $answer]);
});

Route::post('/vote', function () {
    $answer = App\Answer::find(Input::get('answer_id'));

    $answer->upvote_count += 1;

    $answer->save();

    $vote = new App\Vote();

    $vote->answer_id = $answer->id;

    $vote->user_id = Auth::user()->id;

    $vote->save();

    $answer->user->reputation += 10;

    $answer->user->save();

    return Redirect::to('/question/' . $answer->question->id);
});
