<?php

namespace App\Http\Controllers\Api;

use App\Models\Child;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Http\Resources\ChildCollection;
use App\Http\Resources\ChildResource;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->user()->tokenCan('children:view'));
        return new ChildCollection(Child::all());
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
     * @param  \App\Http\Requests\StoreChildRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildRequest $request)
    {
        $classroom = Classroom::findOrFail($request->classroom_id);
        $childrenInClass = $classroom->loadMissing('children')->children->count();
        if ($childrenInClass < 10) {
            return new ChildResource(Child::create($request->all()));
        } else {
            return 'Creation failed. Maximum children in class has been reached';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        return new ChildResource($child->loadMissing(['guardian', 'classroom', 'image', 'orders']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildRequest  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildRequest $request, Child $child)
    {
        if ($request->has('classroom_id')) {
            if ($request->classroom_id === $child->classroom_id) {
                return $child->updateOrFail($request->all());
            } else {
                $classroom = Classroom::findOrFail($request->classroom_id);
                $childrenInClass = $classroom->loadMissing('children')->children->count();
                if ($childrenInClass < 10) {
                    return $child->updateOrFail($request->all());
                } else {
                    return 'Update failed. Maximum children in class has been reached';
                }
            }
        } else {
            return $child->updateOrFail($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        return $child->deleteOrFail();
    }
}
