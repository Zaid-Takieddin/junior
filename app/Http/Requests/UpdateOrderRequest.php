<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('PUT')) {

            return [
                'childId' => ['required', 'integer', 'exists:children,id',],
                'totalPrice' => ['required', 'numeric']
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'childId' => ['sometimes', 'required', 'integer', 'exists:children,id',],
                'totalPrice' => ['sometimes', 'required', 'numeric']
            ];
        }
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
