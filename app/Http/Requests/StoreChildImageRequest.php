<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChildImageRequest extends FormRequest
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
            'child_id' => ['required', 'integer', 'exists:children,id', 'unique:child_images,child_id'],
            'image' => ['required', 'file', 'image', 'max:2048']
        ];
    }

    protected function prepareForValidation()
    {
        $merge = [];

        if ($this->has('childId')) {
            $merge['child_id'] = $this->get('childId');
        }

        $this->merge($merge);
    }
}
