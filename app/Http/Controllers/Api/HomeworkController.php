<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;
use App\Http\Resources\HomeworkResource;
use Illuminate\Support\Facades\Storage;

class HomeworkController extends Controller
{
    private $FOLDER = 'homeworks';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new HomeworkResource(Homework::all());
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
     * @param  \App\Http\Requests\StoreHomeworkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeworkRequest $request)
    {
        $data = $request->all();

        $attachment = $request->file('attachment');
        $attachmentName = time() . '.' . $attachment->extension();
        $attachment->storeAs('public/' . $this->FOLDER . '/' . $request->input('classroom_id'), $attachmentName);

        $data['attachment'] = asset('storage/' . $this->FOLDER . '/' . $request->input('classroom_id') . '/' . $attachmentName);

        return new HomeworkResource(Homework::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        return new HomeworkResource($homework->loadMissing(['classroom', 'answers']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeworkRequest  $request
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeworkRequest $request, Homework $homework)
    {
        $file_exists = Storage::disk('public')->exists($this->FOLDER . '/' . $homework->classroom_id . '/' .  basename($homework->attachment));

        if ($file_exists) {
            return $homework->updateOrFail($request->all());
        } else {
            Storage::disk('public')->delete($this->FOLDER . '/' . $homework->classroom_id . '/' .  basename($homework->attachment));

            $data = $request->all();

            $attachment = $request->file('attachment');
            $attachmentName = time() . '.' . $attachment->extension();
            $attachment->storeAs('public/' . $this->FOLDER . '/' . $request->input('classroom_id'), $attachmentName);

            $data['attachment'] = asset('storage/' . $this->FOLDER . '/' . $request->input('classroom_id') . '/' . $attachmentName);

            return $homework->updateOrFail($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        if (Storage::disk('public')->delete($this->FOLDER . '/' . $homework->classroom_id . '/' .  basename($homework->attachment))) {
            return $homework->deleteOrFail();
        } else {
            return 'file not found';
        }
    }
}
