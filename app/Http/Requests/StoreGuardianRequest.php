<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuardianRequest extends FormRequest
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
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phoneNumber' => ['required', 'string', 'unique:guardians,phone_number'],
            'balance' => ['required', 'numeric', 'min:50000']
        ];
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

        if ($this->has('phoneNumber')) {
            $merge['phone_number'] = $this->get('phoneNumber');
        }

        $this->merge($merge);
    }
}
