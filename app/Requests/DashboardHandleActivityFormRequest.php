<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DashboardHandleActivityFormRequest extends FormRequest
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
            'work' => ['string' , 'min:1', 'max:255'],
            'interest' => ['string' , 'min:1', 'max:255'],
            'prosperity' => ['string' , 'min:1', 'max:255'],

        ];


    }

    protected function prepareForValidation()
    {
        $this->merge(
            [

                'work' => select($this->work),
                'interest' => select($this->interest),
                'prosperity' => select($this->prosperity)
            ]
        );
    }

}
