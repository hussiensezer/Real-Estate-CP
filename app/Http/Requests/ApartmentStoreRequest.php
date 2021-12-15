<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApartmentStoreRequest extends FormRequest
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



            "personal_type" => ['required' ,  Rule::in(['owners', 'mediators'])],
            'owner_name' => 'required_if:personal_type,==,owners',
            'owner_phone' => 'required_if:personal_type,==,owners|max:11',
            'mediators_name' => 'required_if:personal_type,==,mediators',
            'mediators_phone' => 'required_if:personal_type,==,mediators|max:11',

            "apartment_type" => ['required' ,  Rule::in(['sell', 'rent', 'rent_w_furniture'])],
            'apartment_price' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'rent_insurance' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'rent_value' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'duration_contract' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'annual_expenses' => 'sometimes|regex:/^[0-9]+$/|nullable',


            'city' => 'required|exists:cities,id',
            'step' => 'required|exists:steps,id',
            'group' => 'required|exists:groups,id',

            'building' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'floor' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'apartment_no' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'view' => ['sometimes','nullable', Rule::in(['street', 'big_garden','small_garden','parking','opening'])],
            'decoration' => ['sometimes','nullable', Rule::in(['company', 'private','company_change'])],
            'directions' => ['sometimes','nullable', Rule::in(['north', 'east','west','south'])],
            'total_rooms' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'total_bathroom' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'apartment_space' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'garden' => 'sometimes|regex:/^[0-9]+$/|nullable',
            'electric' => 'sometimes|nullable|'.  Rule::in(["1","0"]),
            'gas' => 'sometimes|nullable|'.  Rule::in(["1","0"]),
            'water' => 'sometimes|nullable|'.  Rule::in(["1","0"]),
            'telephone' => 'sometimes|nullable|'.  Rule::in(["1","0"]),
            'images' => 'sometimes|array|nullable|max:2000',
            'videos' => 'sometimes|array|nullable|max:50000',
        ];
    }
}
