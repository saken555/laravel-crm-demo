<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'email',
                // Эта магия позволяет получить доступ к клиенту из маршрута
                // и игнорировать его ID при проверке на уникальность email.
                Rule::unique('clients')->ignore($this->route('client')->id),
            ],
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ];
    }
}