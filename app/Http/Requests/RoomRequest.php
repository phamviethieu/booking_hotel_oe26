<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => 'required',
            'hotel_id' => 'required',
            'type_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => trans('message.room_required'),
            'hotel_id.required' => trans('message.hotel_required'),
        ];
    }
}
