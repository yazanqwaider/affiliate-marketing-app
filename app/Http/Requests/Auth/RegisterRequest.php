<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'     => ["required", "image", "max:5000"],
            'name'      => ["required"],
            'email'     => ["required", "email", "unique:users,email"],
            'phone'     => ["required", "digits:10"],
            'birthdate' => ["nullable", "date"],
            'referer_user_id' => ['nullable', 'exists:users,id'],
            'password'  => ["required", "min:8", "confirmed"],
        ];
    }
}
