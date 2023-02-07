<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\FoodOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OrderCollection(Order::all());
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->except('food'));
        $food = $request->input('food');
        // dd($order->id);
        $pivotData = [];
        // $attachedIds = [];
        foreach ($food as $single_food) {
            // dd($single_food['id']);
            $pivotData['order_id'] = $order->id;
            $pivotData['food_id'] = $single_food['id'];
            $pivotData['price'] = $single_food['price'];
            // array_push($attachedIds, $single_food['id']);
            FoodOrder::create($pivotData);
        }
        // dd($attachedIds);
        // FoodOrder::create($pivotData);
        $attachedIds = FoodOrder::where('order_id', $order->id)->get()->map->only('id', 'price');
        // dd($attachedIds);
        $order->items()->attach($attachedIds);
        return new OrderResource($order);
        // return new OrderResource(Order::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return new OrderResource($order->loadMissing('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        return $order->updateOrFail($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        return $order->deleteOrFail();
    }
}
