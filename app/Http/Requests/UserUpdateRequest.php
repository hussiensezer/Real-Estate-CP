<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => [
                'required','email',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'password' => 'sometimes|nullable|confirmed|min:6|max:12',
            'status' => 'required|boolean',
            'role' => 'required|exists:roles,id'
        ];
    }
}
