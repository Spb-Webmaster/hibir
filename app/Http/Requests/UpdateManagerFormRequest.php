<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateManagerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [ 'string' , 'min:1'],
            'phone' => [ 'string', 'min:5'],
            'email' => [ 'email'],
            'whatsapp' => ['string',  'min:5']
        ];


    }

    protected function prepareForValidation()
    {

        $this->merge(
            [
                'email' => str(request('email'))
                    ->squish()
                    ->lower()
                    ->value(),
                'phone' => phone($this->phone),
            ]
        );
    }
}
