<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => ['string', 'max:225', 'min:2'],
            'address' => ['string', 'min:5', 'max:225'],
            'owner' => ['string', 'min:2', 'max:225'],
            'employee_count' => ['integer', 'min:1'],
            'worth' => ['integer',],
            'founded_at' => ['date'],
        ];
    }
}
