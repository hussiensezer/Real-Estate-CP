<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupStoreRequest extends FormRequest
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
           "name" => 'required|regex:/^[a-zA-Z0-9]+$/|unique:groups,name,null,id,city_id,' . $this->request->get('city'),
            'city' => 'required|exists:cities,id',
            'step' => 'required|exists:steps,id',
            'status' => 'required|boolean',
        ];
    }
}
