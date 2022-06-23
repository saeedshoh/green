<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Models\Question;
use App\Services\QuizService;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $service;

    public function __construct(QuizService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.quiz.index')->withQuizzes(Question::withTrashed()->latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $question = Question::create($request->validated());

        $this->service->syncVariants($question, $request->variants);

        alert()->success('Успешно!', 'Опрос успешно добавлен!');

        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($question)
    {
        $question = Question::withTrashed()->findOrFail($question);

        return view('dashboard.quiz.show')->withQuiz($question->load('variants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function restore($question)
    {
        Question::onlyTrashed()->findOrFail($question)->restore();

        alert()->success('Успешно!', 'Опрос успешно восстановлен!');

        return back();
    }

}
