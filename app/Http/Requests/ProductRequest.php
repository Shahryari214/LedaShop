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
        if($this->method() == 'POST') {
            return [
                'title' => 'required|max:250',
                'description' => 'required',
                'body' => 'required',
                'tags' => 'required',
                'price' => 'required',
                'formats' => 'required',
                'size_disk' => 'required',
                'size_documents' => 'required',
                'mode' => 'required',
                'resolution' => 'required',
            ];
        }

        return [
            'title' => 'required|max:250',
            'description' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'price' => 'required',
            'formats' => 'required',
            'size_disk' => 'required',
            'size_documents' => 'required',
            'mode' => 'required',
            'resolution' => 'required',
        ];

    }
}
