<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        return [
            'account' => 'required|bail|unique:admins,account,' . $this->id,
            'name' => 'required|bail|unique:admins,name,' . $this->id,
            'email' => 'required|bail|unique:admins,email,' . $this->id,
            'password' => 'required|min:8',
            'status' => 'required',
        ];
    }
}
