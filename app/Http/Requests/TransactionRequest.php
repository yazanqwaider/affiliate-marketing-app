<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'   => ['required', 'exists:categories,id'],
            'amount'        => ['required', 'numeric', 'min:1'],
        ];
    }
}
