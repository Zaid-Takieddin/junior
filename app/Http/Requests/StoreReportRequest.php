<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'childId' => ['required', 'integer', 'exists:children,id'],
            'reporter' => ['required', 'integer', 'exists:teachers,id'],
            'description' => ['required', 'string']
        ];
    }

    public function prepareForValidation()
    {
        $merge = [];

        if ($this->has('childId')) {
            $merge['child_id'] = $this->input('childId');
        }

        $this->merge($merge);
    }
}
