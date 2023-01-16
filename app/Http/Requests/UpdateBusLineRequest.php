<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusLineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'lineSupervisorId' => ['required', 'integer', 'exists:line_supervisors,id'],
                'name' => ['required', 'string', 'unique:bus_lines,name']
            ];
        }

        if ($this->isMethod('PATCH')) {
            return [
                'lineSupervisorId' => ['sometimes', 'required', 'integer', 'exists:line_supervisors,id'],
                'name' => ['sometimes', 'required', 'string', 'unique:bus_lines,name']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $merge = [];

        if ($this->has('lineSupervisorId')) {
            $merge['line_supervisor_id'] = $this->get('lineSupervisorId');
        }

        $this->merge($merge);
    }
}
