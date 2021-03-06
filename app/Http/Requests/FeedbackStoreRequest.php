<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackStoreRequest extends FormRequest
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
            "name" => 'required',
            'phone' => 'required|min:10|max:11',
            'apartment_code' => 'sometimes|nullable|exists:apartments,serial_no',
            'time_feedback' => '',
            'description' => '',

        ];
    }
}
