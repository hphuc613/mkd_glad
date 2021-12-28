<?php

namespace Modules\Shipping\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'value' => 'required|numeric|min:0',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute' . trans(' can not be empty.'),
            'numeric' => ':attribute' . trans(' must be a number.'),
            'min' => ':attribute' . trans(' must be at least 0.'),
        ];
    }

    public function attributes()
    {
        return [
            'value' => trans('Value'),
            'status' => trans('Status'),
        ];
    }
}
