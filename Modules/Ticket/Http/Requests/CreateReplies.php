<?php

namespace Modules\Ticket\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReplies extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'replybody' => 'required|min:5'
        ];
    }

    public function messages()
{
    return [
        'replybody.required' => 'You have to leave a comment',        
    ];
}

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
