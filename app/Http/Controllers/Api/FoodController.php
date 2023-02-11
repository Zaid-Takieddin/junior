<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodCollection;
use App\Http\Resources\FoodResource;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    private $FOLDER = 'food';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new FoodCollection(Food::all());
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
     * @param  \App\Http\Requests\StoreFoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {
        $data = $request->all();

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/' . $this->FOLDER . '/' . $request->input('type'), $imageName);

        $data['image'] = asset('storage/' . $this->FOLDER . '/' . $request->input('type') . '/' . $imageName);

        return new FoodResource(Food::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return new FoodResource($food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodRequest  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $image_exists = Storage::disk('public')->exists($this->FOLDER . '/' . $food->type . '/' .  basename($food->image));

        if ($image_exists) {
            return $food->updateOrFail($request->all());
        } else {
            Storage::disk('public')->delete($this->FOLDER . '/' . $food->type . '/' .  basename($food->image));

            $data = $request->all();

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/' . $this->FOLDER . '/' . $request->input('type'), $imageName);

            $data['image'] = asset('storage/' . $this->FOLDER . '/' . $request->input('type') . '/' . $imageName);

            return $food->updateOrFail($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if (Storage::disk('public')->delete($this->FOLDER . '/' . $food->type . '/' .  basename($food->image))) {
            return $food->deleteOrFail();
        } else {
            return 'image not found';
        }
    }
}
