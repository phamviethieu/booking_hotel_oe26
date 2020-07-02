<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'type_id' => 'required',
            'comment' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => trans('message.request.comment_required'),
            'comment.max' => trans('message.request.comment_max_character'),
        ];
    }
}
