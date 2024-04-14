<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "codigo" => "required|max:255",
            "producto" => "required|max:255",
            "costo" => "required|numeric|max:255",
            "cantidad" => "numeric|max:255",
            "marca" => "max:255",
        ];
    }
}