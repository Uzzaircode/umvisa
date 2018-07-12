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
            'financial_aid' => 'required',
            'account_no_ref' => 'required_if:financial_aid,university|required_if:financial_aid,faculty|required_if:financial_aid,grant',
            'sponsor_name' => 'required_if:financial_aid,sponsorship',
            'others_remarks' => 'required_if:financial_aid,others',
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
