<?php

namespace App\Http\Controllers\Front;

use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Http\Resources\QuizResultResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quiz = Question::with('variants')
                ->where('start', '<', now())
                ->where('ending', '>', now())
                ->whereDoesntHave('users', function($q){ $q->where('user_id', auth()->user()->id);})
                ->first();

        if (is_null($quiz))
            return response()->error('Опросник не найдено', 404);

        return new QuizResource($quiz);
    }

    public function storeResult($question, Request $request, UserService $userService)
    {
        $this->validate($request, ['variant_id' => 'required|integer']);

        if($userService->isAnswerFromQuiz($question))
            return response()->error('На опрос можно ответить один раз', 403);

        $question = Question::find($question);

        auth()->user()->quizzes()->attach($question, ['answer_id' => $request->variant_id]);

        $userService->addQuizBalls($question);

        return new QuizResultResource($question->load('users')->loadCount('users'));
    }
}
