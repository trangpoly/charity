<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'category_id' => 'bail|required',
            'name' => 'bail|required|min:3|max:25',
            'images.*' => 'mimes:jpeg,png,jpg,gif|max:2000',
            'weight' => 'bail|required',
            'quantity' => 'bail|required',
            'expire_at' => 'bail|required',
            'city' => 'bail|required',
            'district' => 'bail|required',
            'address' => 'bail|required',
            'phone' => 'bail|required|regex:/^(0[3-5-7-8-9])+([0-9]{8})$/',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Hãy chọn danh mục con cho sản phẩm *',
            'name.required' => 'Tên sản phẩm không được để trống *',
            'name.min' => 'Tên sản phẩm quá ngắn, hãy đặt tên dài hơn',
            'name.max' => 'Tên sản phẩm quá dài, hãy rút ngắn lại',
            'images.*.mimes' => 'Định dạng của ảnh không hợp lệ *',
            'images.*.max' => 'Ảnh không được quá 2MB *',
            'weight.required' => 'Nhập trọng lượng của sản phẩm *',
            'quantity.required' => 'Nhập số lượng của sản phẩm *',
            'expire_at.required' => 'Nhập hạn sử dụng của sản phẩm *',
            'city.required' => 'Chọn thành phố của bạn *',
            'district.required' => 'Chọn quận huyện của bạn *',
            'address.required' => 'Nhập địa chỉ của bạn *',
            'phone.required' => 'Số điện thoại không được để trống *',
            'phone.regex' => 'Số điện thoại không hợp lệ *',
        ];
    }
}
