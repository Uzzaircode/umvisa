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
            'venue' => 'required',
            'state' => 'required',
            'country' => 'required',
            'event_type' => 'required',
            'description' => 'required|min:10',
            'travel_start_date' => 'required',
            'travel_end_date' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
            'attachments.required' => 'required',
            'type' => 'required',
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

    public function messages()
    {
        return [
            'title.required' => 'We need to know the title of the activity/event',
            'venue.required' => 'We need to know the venue of the activity/event',
            'state.required' => 'In which state the activity/event will be held?',
            'event_type.required' => 'What is the type of the event?',
            'description.required' => 'Please describe the activity/event',
            'travel_start_date.required' => 'When will you go there?',
            'travel_end_date.required' => 'When will you come back here?',
            'event_start_date.required' => 'When will the event commence?',
            'event_end_date.required' => 'When will the event end?',
            'type.required' => 'Please choose the type of application'
        ];
    }
}
