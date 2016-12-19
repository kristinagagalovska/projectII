<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyLogoRequest extends FormRequest
{

    public function rules()
    {
        return [
            'logo' => 'required | image | mimes:jpeg, png, jpg, gif, svg | max:2048'
        ];
    }

    public function authorize()
    {
        return true;
    }
}