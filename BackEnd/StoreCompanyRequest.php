<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:225', 'min:2'],
            'address' => ['required', 'string', 'min:5', 'max:40'],
            'owner' => ['required', 'string', 'min:2', 'max:225'],
            'employee_count' => ['required', 'integer', 'min:1'],
            'worth' => ['required', 'integer',],
            'founded_at' => ['required', 'date'],
        ];
    }
}
