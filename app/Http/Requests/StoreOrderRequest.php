<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $guardian = Guardian::where('email', $this->user()->email)->first();
        // if ($guardian) {
        //     $children = $guardian->children;
        // }
        // return $children->count() > 0;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // $children = Guardian::where('first_name', 'Jarod')->firstOrFail()->children;
        // dd($children->pluck('id'));

        return [
            'childId' => ['required', 'integer', 'exists:children,id',],
            'totalPrice' => ['required', 'numeric'],
            'food' => ['required', 'array'],
            'food.*.id' => ['integer', 'exists:food,id'],
            'food.*.name' => ['string', 'exists:food,name'],
            'food.*.description' => ['string', 'exists:food,description'],
            'food.*.price' => ['numeric', 'exists:food,price']
        ];
    }

    protected function prepareForValidation()
    {
        $merge = [];

        if ($this->has('childId')) {
            $merge['child_id'] = $this->input('childId');
        }

        if ($this->has('totalPrice')) {
            $merge['total_price'] = $this->input('totalPrice');
        }

        $this->merge($merge);
    }
}
