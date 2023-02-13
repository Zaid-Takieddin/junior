<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeworkAnswerRequest extends FormRequest
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
            'homeworkId' => ['required', 'string', 'exists:homework,id'],
            'childId' => ['required', 'string', 'exists:children,id'],
            // 'answer' => ['required', 'file', 'max:2048']
        ];
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
