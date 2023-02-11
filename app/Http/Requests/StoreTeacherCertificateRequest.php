<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherCertificateRequest extends FormRequest
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
            'certificate' => ['required', 'file', 'image', 'max:2048']
        ];
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
