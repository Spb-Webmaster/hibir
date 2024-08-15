<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DashboardHandleMailingFormRequest extends FormRequest
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
            'mailing' => ['email',  Rule::unique('dashboard_notifications')->ignore(auth()->user()->id, 'user_id')
        ->where(fn ($query) => $query->where('mailing', '!=', null ))],
            'checked_mailing' => ['integer'],

        ];

    }

   protected function prepareForValidation()
    {
        $this->merge(
            [
                'mailing' => str(request('mailing'))
                    ->squish()
                    ->lower()
                    ->value(),
                'checked_mailing' => checked($this->checked_mailing)

            ]
        );
    }
}
