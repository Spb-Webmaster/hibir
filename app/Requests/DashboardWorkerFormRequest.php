<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DashboardWorkerFormRequest extends FormRequest
{

    protected $redirect = '/cabinet#cabinetWorker';

    protected $errorBag = 'cabinet-worker';

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
            'wname' => ['array'],
            'wemail' => ['array'],
            'wphone' => ['array'],

        ];



    }
    protected function prepareForValidation()
    {
        $this->merge(
            [
                'wphone' => arrayPhone($this->wphone)
            ]
        );
    }



}
