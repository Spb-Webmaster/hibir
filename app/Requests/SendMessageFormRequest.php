<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SendMessageFormRequest extends FormRequest
{

   // protected $errorBag = 'cabinet-handle';

    /**
     * Determine if the user is authorized to make this request.


     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'send_phone' => ['required', 'string', 'min:2'],
            'send_name' => ['string', 'min:2']

        ];


    }

}
