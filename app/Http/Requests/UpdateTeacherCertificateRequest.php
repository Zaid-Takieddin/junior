<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherCertificateRequest extends FormRequest
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
                'teacherId' => ['required', 'integer', 'exists:teachers,id'],
                'certificate' => ['required', 'file', 'image', 'max:2048']
            ];
        }
        if ($this->isMethod('PATCH')) {
            return [
                'teacherId' => ['sometimes', 'required', 'integer', 'exists:teachers,id'],
                'certificate' => ['sometimes', 'required', 'file', 'image', 'max:2048']
            ];
        }
    }

    public function prepareForValidation()
    {
        $merge = [];

        if ($this->has('teacherId')) {
            $merge['teacher_id'] = $this->input('teacherId');
        }

        $this->merge($merge);
    }
}
