<?php

namespace Modules\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'venue' => 'required|max:255',
            'country' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'alternate_email'=> 'required',
            'type' => 'required',            
            // 'attachments' => 'required'

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
