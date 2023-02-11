<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeworkRequest extends FormRequest
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
                'classroomId' => ['required', 'string', 'exists:classrooms,id'],
                'name' => ['required', 'string'],
                'description' => ['required', 'string'],
                'attachment' => ['required', 'file', 'max:2048'],
                'expiration' => ['required', 'date']
            ];
        }
        if ($this->isMethod('PATCH')) {
            return [
                'classroomId' => ['sometomes', 'required', 'string', 'exists:classrooms,id'],
                'name' => ['sometomes', 'required', 'string'],
                'description' => ['sometomes', 'required', 'string'],
                'attachment' => ['sometimes', 'required', 'file', 'max:2048'],
                'expiration' => ['sometomes', 'required', 'date']
            ];
        }
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
