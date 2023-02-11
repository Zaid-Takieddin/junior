<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeworkAnswer;
use App\Http\Requests\StoreHomeworkAnswerRequest;
use App\Http\Requests\UpdateHomeworkAnswerRequest;
use App\Http\Resources\HomeworkAnswerCollection;
use App\Http\Resources\HomeworkAnswerResource;
use Illuminate\Support\Facades\Storage;

class HomeworkAnswerController extends Controller
{
    private $FOLDER = 'homeworkAnswers';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new HomeworkAnswerCollection(HomeworkAnswer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeworkAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeworkAnswerRequest $request)
    {
        if (HomeworkAnswer::all()->count() < 1) {
            $data = $request->all();

            $answer = $request->file('answer');
            $answerName = time() . '.' . $answer->extension();
            $answer->storeAs('public/' . $this->FOLDER . '/' . $request->input('homework_id'), $answerName);

            $data['answer'] = asset('storage/' . $this->FOLDER . '/' . $request->input('homework_id') . '/' . $answerName);

            return new HomeworkAnswerResource(HomeworkAnswer::create($data));
        } else {
            return 'You already posted an answer to this homework';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeworkAnswer  $homeworkAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(HomeworkAnswer $homeworkAnswer)
    {
        return new HomeworkAnswerResource($homeworkAnswer->loadMissing(['homework', 'child']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeworkAnswer  $homeworkAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeworkAnswer $homeworkAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeworkAnswerRequest  $request
     * @param  \App\Models\HomeworkAnswer  $homeworkAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeworkAnswerRequest $request, HomeworkAnswer $homeworkAnswer)
    {
        $file_exists = Storage::disk('public')->exists($this->FOLDER . '/' . $homeworkAnswer->homework_id . '/' .  basename($homeworkAnswer->answer));

        if ($file_exists) {
            return $homeworkAnswer->updateOrFail($request->all());
        } else {
            Storage::disk('public')->delete($this->FOLDER . '/' . $homeworkAnswer->homework_id . '/' .  basename($homeworkAnswer->answer));

            $data = $request->all();

            $answer = $request->file('answer');
            $answerName = time() . '.' . $answer->extension();
            $answer->storeAs('public/' . $this->FOLDER . '/' . $request->input('homework_id'), $answerName);

            $data['answer'] = asset('storage/' . $this->FOLDER . '/' . $request->input('homework_id') . '/' . $answerName);

            return $homeworkAnswer->updateOrFail($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeworkAnswer  $homeworkAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeworkAnswer $homeworkAnswer)
    {
        if (Storage::disk('public')->delete($this->FOLDER . '/' . $homeworkAnswer->homework_id . '/' .  basename($homeworkAnswer->answer))) {
            return $homeworkAnswer->deleteOrFail();
        } else {
            return 'answer not found';
        }
    }
}
