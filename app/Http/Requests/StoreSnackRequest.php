<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSnackRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'unique:snacks,name'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric']
        ];
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
