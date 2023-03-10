<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLineSupervisorRequest extends FormRequest
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
            'readyStatus' => ['required', 'boolean']
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

        if ($this->has('readyStatus')) {
            $merge['ready_status'] = $this->get('readyStatus');
        }

        $this->merge($merge);
    }
}
