<?php

namespace App\Http\Requests;

use App\Models\DashboardNotification;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DashboardHandleTelegramFormRequest extends FormRequest
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
            'telegram' => ['max:255',
                Rule::unique('dashboard_notifications')->ignore(auth()->user()->id, 'user_id')
                ->where(fn ($query) => $query->where('telegram', '!=', null ))],
            'checked_telegram' => ['integer'],
        ];


    }
    protected function prepareForValidation()
    {
        $this->merge(
            [
                'checked_telegram' => checked($this->checked_telegram)
            ]
        );
    }


}
