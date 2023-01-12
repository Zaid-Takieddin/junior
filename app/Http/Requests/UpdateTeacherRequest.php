<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
                'firstName' => ['required', 'string'],
                'lastName' => ['required', 'string'],
                'birthDate' => ['required', 'date'],
                'address' => ['required', 'string'],
                'phoneNumber' => ['required', 'string', 'unique:teachers,phone_number']
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'firstName' => ['required', 'string'],
                'lastName' => ['required', 'string'],
                'birthDate' => ['required', 'date'],
                'address' => ['required', 'string'],
                'phoneNumber' => ['required', 'string', 'unique:teachers,phone_number']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $merge = [];

        if ($this->has('firstName')) {
            $merge['first_name'] = $this->get('firstName');
        }

        if ($this->has('lastName')) {
            $merge['last_name'] = $this->get('lastName');
        }

        if ($this->has('birthDate')) {
            $merge['birth_date'] = $this->get('birthDate');
        }

        if ($this->has('phoneNumber')) {
            $merge['phone_number'] = $this->get('phoneNumber');
        }

        $this->merge($merge);
    }
}
