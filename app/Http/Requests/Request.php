<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest
{
    protected function formatErrors(Validator $validator)
    {
        if ($this->wantsJson()) {
            return [
                'message' => trans('validation.failed'),
                'errors' => array_map('array_pop', $validator->getMessageBag()->toArray()),
            ];
        }

        return parent::formatErrors($validator);
    }
}
