<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|string',
            'phone_number' => 'bail|required|regex:/^(0[3-5-7-8-9])+([0-9]{8})$/|unique:users,phone_number,' . $this->id,
            'email' => 'bail|required|email|unique:users,email,' . $this->id
        ];
    }
}
