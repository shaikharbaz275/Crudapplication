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
        if ($this->isMethod('POST')) {

            return [
                'name' => 'required|max:150|string|',
                'images' => 'required|array',
                'images.*' => 'image',
                'prize' => 'numeric',
                'description' => 'required',
                'fromactive' => 'required|date',
                'toactive' => 'required|date'
            ];
        }
        return [
            'name' => 'required|max:100|string|',
            'images' => 'nullable',
            'prize' => 'numeric',
            'description' => 'required',
            'fromactive' => 'nullable|date',
            'toactive' => 'nullable|date'
        ];
    }
}
