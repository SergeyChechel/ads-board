<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
        $userId = $this->route('user') ?? $this->route('id');
        
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId), // Игнорируем текущий email пользователя
            ],
            'password' => 'required|string|min:4',
            // Дополнительные поля
            "firstname" => 'required|string|max:255',
            'lastname' => 'string|max:255',
            'middlename' => 'string|max:255',
            'birthday' => 'date',
            'role_id' => 'integer',
            'address' => 'string|max:255',
            'phone' => 'string|max:20',
            'status' => 'string|max:100',
        ];
    }
}
