<?php

namespace Modules\Converter\Http\Requests\Converter;

use Illuminate\Foundation\Http\FormRequest;

class ConvertRequest extends FormRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'fiat' => ['required', 'integer', 'exists:fiats,id'],
            'crypto' => ['required', 'integer',  'exists:currencies,id'],
            'amount' => ['required', 'numeric'],
            'is_crypto' => ['required', 'boolean'],
        ];
    }
}
