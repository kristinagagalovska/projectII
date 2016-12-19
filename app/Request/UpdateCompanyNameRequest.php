<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyNameRequest extends FormRequest {

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}