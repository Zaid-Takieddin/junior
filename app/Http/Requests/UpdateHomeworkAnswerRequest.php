<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeworkAnswerRequest extends FormRequest
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
                'homeworkId' => ['required', 'string', 'exists:homework,id'],
                'childId' => ['required', 'string', 'exists:children,id'],
                'answer' => ['required', 'file', 'max:2048']
            ];
        }
        if ($this->isMethod('PATCH')) {
            return [
                'homeworkId' => ['sometimes', 'required', 'string', 'exists:homework,id'],
                'childId' => ['sometimes', 'required', 'string', 'exists:children,id'],
                'answer' => ['sometimes', 'required', 'file', 'max:2048']
            ];
        }
    }

    public function prepareForValidation()
    {
        $merge = [];

        if ($this->has('homeworkId')) {
            $merge['homework_id'] = $this->input('homeworkId');
        }

        if ($this->has('childId')) {
            $merge['child_id'] = $this->input('childId');
        }

        $this->merge($merge);
    }
}
