<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChildImage;
use App\Http\Requests\StoreChildImageRequest;
use App\Http\Requests\UpdateChildImageRequest;
use App\Http\Resources\ChildImageCollection;
use App\Http\Resources\ChildImageResource;
use Illuminate\Support\Facades\Storage;

class ChildImageController extends Controller
{
    private $FOLDER = 'children';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ChildImageCollection(ChildImage::all());
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
     * @param  \App\Http\Requests\StoreChildImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildImageRequest $request)
    {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/' . $this->FOLDER, $imageName);

        return new ChildImageResource(ChildImage::create([
            'child_id' => $request->child_id,
            'image' => asset('storage/' . $this->FOLDER . '/' . $imageName)
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildImage  $childImage
     * @return \Illuminate\Http\Response
     */
    public function show(ChildImage $childImage)
    {
        return new ChildImageResource($childImage->loadMissing('child'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildImage  $childImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildImage $childImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildImageRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildImageRequest $request, $id)
    {
        $childImage = ChildImage::where('child_id', $id)->firstOrFail();

        if ($childImage) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/' . $this->FOLDER, $imageName);

            Storage::disk('public')->delete($this->FOLDER . '/' . basename($childImage->image));

            $childImage->updateOrFail([
                'image' => asset('storage/' . $this->FOLDER . '/' . $imageName)
            ]);

            return 'updated successfully';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildImage  $childImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildImage $childImage)
    {
        return $childImage->deleteOrFail();
    }
}
