<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,filter_unicode',
                'max:100',
                Rule::unique('users')->ignore($this->user)
            ],
            'rol_id' => 'sometimes|exists:rols,id',
        ];
    }
}