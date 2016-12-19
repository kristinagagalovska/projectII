<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest {

    public function rules()
    {
        return [
            'name' => 'required',
            'logo' => 'required | image | mimes:jpeg, png, jpg, gif, svg | max:2048'
        ];
    }

    public function authorize()
    {
        return true;
    }


}