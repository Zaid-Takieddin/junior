<?php

namespace App\Http\Controllers\Api;

use App\Models\ChildParent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChildParentRequest;
use App\Http\Requests\UpdateChildParentRequest;
use App\Http\Resources\ChildParentCollection;
use App\Http\Resources\ChildParentResource;

class ChildParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ChildParentCollection(ChildParent::all());
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
     * @param  \App\Http\Requests\StoreChildParentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildParentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildParent  $childParent
     * @return \Illuminate\Http\Response
     */
    public function show(ChildParent $childParent)
    {
        return new ChildParentResource($childParent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildParent  $childParent
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildParent $childParent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildParentRequest  $request
     * @param  \App\Models\ChildParent  $childParent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildParentRequest $request, ChildParent $childParent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildParent  $childParent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildParent $childParent)
    {
        //
    }
}
