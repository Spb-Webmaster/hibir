<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DashboardLegalEntityFormRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * Определите, авторизован ли пользователь для выполнения этого запроса.

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
            'bin' => ['string' , 'min:1', 'max:10'],
            'company' => ['string' , 'min:1', 'max:255'],
            'address' => ['string' , 'min:1', 'max:255'],

        ];


    }




}
