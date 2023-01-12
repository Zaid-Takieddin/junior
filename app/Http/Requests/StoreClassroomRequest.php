<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
            'teacherId' => ['required', 'integer', 'exists:teachers,id'],
            'level' => ['required', Rule::in(['KG1', 'KG2', 'KG3', 'kg1', 'kg2', 'kg3'])]
        ];
    }

    protected function prepareForValidation()
    {
        $merge = [];

        if ($this->has('teacherId')) {
            $merge['teacher_id'] = $this->get('teacherId');
        }

        $this->merge($merge);
    }
}
