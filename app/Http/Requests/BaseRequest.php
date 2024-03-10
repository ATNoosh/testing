<?php

namespace App\Http\Requests;

use App\Rules\CredentialRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        if ($this->expectsJson()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        parent::failedValidation($validator);
    }
}
