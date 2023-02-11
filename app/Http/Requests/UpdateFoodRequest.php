<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFoodRequest extends FormRequest
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
                'name' => ['required', 'string', 'unique:foods,name'],
                'description' => ['required', 'string'],
                'type' => ['required', 'string', Rule::in('meal', 'drink')],
                'price' => ['required', 'numeric'],
                'image' => ['required', 'file', 'image', 'max:2048']
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'name' => ['sometimes', 'required', 'string', 'unique:foods,name'],
                'description' => ['sometimes', 'required', 'string'],
                'type' => ['required', 'string', Rule::in('meal', 'drink')],
                'price' => ['sometimes', 'required', 'numeric'],
                'image' => ['sometimes', 'required', 'file', 'image', 'max:2048']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $merge = [];

        if ($this->has('description')) {
            $merge['description'] = preg_replace('/\s+/', '', $this->input('description'));
        }

        $this->merge($merge);
    }
}
