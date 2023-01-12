<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChildRequest extends FormRequest
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
                'guardianId' => ['required', 'exists:guardians,id'],
                'classroomId' => ['required', 'exists:classrooms,id'],
                'firstName' => ['required', 'string'],
                'status' => ['required', Rule::in('S', 'B', 'H', 's', 'b', 'h')],
                'birthDate' => ['required', 'date'],
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'guardianId' => ['sometimes', 'required', 'exists:guardians,id'],
                'classroomId' => ['sometimes', 'required', 'exists:classrooms,id'],
                'firstName' => ['sometimes', 'required', 'string'],
                'status' => ['sometimes', 'required', Rule::in('S', 'B', 'H', 's', 'b', 'h')],
                'birthDate' => ['sometimes', 'required', 'date'],
            ];
        }
    }

    protected function prepareForValidation()
    {

        $merge = [];

        if ($this->has('guardianId')) {
            $merge['guardian_id'] = $this->get('guardianId');
        }

        if ($this->has('classroomId')) {
            $merge['classroom_id'] = $this->get('classroomId');
        }

        if ($this->has('firstName')) {
            $merge['first_name'] = $this->get('firstName');
        }

        if ($this->has('birthDate')) {
            $merge['birth_date'] = $this->get('birthDate');
        }

        $this->merge($merge);
    }
}
