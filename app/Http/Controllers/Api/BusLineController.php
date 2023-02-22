<?php

namespace App\Http\Controllers\Api;

use App\Models\BusLine;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusLineRequest;
use App\Http\Requests\UpdateBusLineRequest;
use App\Http\Resources\BusLineCollection;
use App\Http\Resources\BusLineResource;

class BusLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BusLineCollection(BusLine::all());
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
     * @param  \App\Http\Requests\StoreBusLineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusLineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusLine  $busLine
     * @return \Illuminate\Http\Response
     */
    public function show(BusLine $busLine)
    {
        return new BusLineResource($busLine->loadMissing(['children', 'lineSupervisor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusLine  $busLine
     * @return \Illuminate\Http\Response
     */
    public function edit(BusLine $busLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusLineRequest  $request
     * @param  \App\Models\BusLine  $busLine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusLineRequest $request, BusLine $busLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusLine  $busLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusLine $busLine)
    {
        //
    }
}
