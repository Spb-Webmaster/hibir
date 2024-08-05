<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ManagerHandleFormRequest extends FormRequest
{

   // protected $errorBag = 'cabinet-handle';

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
            'fio' => ['required', 'string' , 'min:1'],
            'phone' => ['required', 'string', 'min:5',
                Rule::unique('users')->ignore(auth()->user()->id)],
            'email' => ['email', 'unique:users'],


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
