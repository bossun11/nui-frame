<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    /**
     * @Override
     * @param  \Illuminate\Contracts\Validation\Validator
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'message' => 'Validation Error',
            'errors'  => $validator->errors()->toArray(),
        ];
		throw new HttpResponseException(response()->json($data, 400));
    }
}
