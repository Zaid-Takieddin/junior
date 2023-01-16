<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSnackRequest extends FormRequest
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
                'name' => ['required', 'string', 'unique:snacks,name'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric']
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'name' => ['sometimes', 'required', 'string', 'unique:snacks,name'],
                'description' => ['sometimes', 'required', 'string'],
                'price' => ['sometimes', 'required', 'numeric']
            ];
        }
    }
}
