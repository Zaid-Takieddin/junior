<?php

namespace App\Http\Controllers\Api;

use App\Models\LineSupervisor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLineSupervisorRequest;
use App\Http\Requests\UpdateLineSupervisorRequest;
use App\Http\Resources\LineSupervisorCollection;
use App\Http\Resources\LineSupervisorResource;

class LineSupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LineSupervisorCollection(LineSupervisor::all());
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
     * @param  \App\Http\Requests\StoreLineSupervisorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLineSupervisorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LineSupervisor  $lineSupervisor
     * @return \Illuminate\Http\Response
     */
    public function show(LineSupervisor $lineSupervisor)
    {
        return new LineSupervisorResource($lineSupervisor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LineSupervisor  $lineSupervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(LineSupervisor $lineSupervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLineSupervisorRequest  $request
     * @param  \App\Models\LineSupervisor  $lineSupervisor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLineSupervisorRequest $request, LineSupervisor $lineSupervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LineSupervisor  $lineSupervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineSupervisor $lineSupervisor)
    {
        //
    }
}
