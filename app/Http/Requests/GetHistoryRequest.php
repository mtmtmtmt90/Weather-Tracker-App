<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetHistoryRequest extends FormRequest
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
            'cities' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'temp_above' => 'required|numeric',
            'temp_below' => 'required|numeric',
            'conditions' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute cannot be empty!',
            'array' => ':attribute must be an array!',
            'numeric' => ':attribute must be an numeric!',
        ];
    }

    public function attributes()
    {
        return [
            'cities' => 'Cities',
            'startDate' => 'Start date',
            'endDate' => 'End date',
            'temp_above' => 'Above temperature',
            'temp_below' => 'Below temperature',
            'conditions' => 'Weather conditions'
        ];
    }
}
