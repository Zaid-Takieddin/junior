<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeworkRequest extends FormRequest
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
            'classroomId' => ['required', 'string', 'exists:classrooms,id'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'attachment' => ['required', 'file', 'max:2048'],
            'expiration' => ['required', 'date']
        ];
    }

    public function prepareForValidation()
    {
        $merge = [];

        if ($this->has('classroomId')) {
            $merge['classroom_id'] = $this->input('classroomId');
        }

        $this->merge($merge);
    }
}
