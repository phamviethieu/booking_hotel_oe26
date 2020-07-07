<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'unique:users,username',
            'email' => 'unique:users,email',
            'name' => 'required',
            'phone_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => trans('message.request.image_type'),
            'avatar.max' => trans('message.request.image_large'),
            'name.required' => trans('message.request.name_required'),
            'phone_number.required' => trans('message.request.phone_number_required'),
        ];
    }
}
