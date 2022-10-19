<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (!$this->route('id')) {
            return [
                'name' => 'required',
                'image' => 'required',
                'status' => 'required'
            ];
        }
        if ($this->route('id')) {
            return [
                'name' => 'required',
                'status' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Category Name is required',
            'name.unique' => 'Category Name is existed',
            'image.required' => 'Image is required',
            'status.required' => 'Status is required'
        ];
    }
}
