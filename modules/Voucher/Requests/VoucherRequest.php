<?php

namespace Modules\Voucher\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
        $method = segmentUrl(2);
        switch ($method) {
            default:
                return [
                    'code'      => 'required|validate_unique:vouchers',
                    'type'      => 'required',
                    'value'     => 'required|numeric|min:0',
                    'status'    => 'required',
                ];
                break;
            case 'update':
                return [
                    'code'      => 'required|validate_unique:vouchers,' . $this->id,
                    'type'      => 'required',
                    'value'     => 'required|numeric|min:0',
                    'status'    => 'required',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'required'        => ':attribute' . trans(' can not be empty.'),
            'validate_unique' => ':attribute' . trans(' was exist.'),
            'numeric'         => ':attribute' . trans(' must be a number.'),
            'min'             => ':attribute' . trans(' must be at least 0.'),
        ];
    }

    public function attributes()
    {
        return [
            'code'     => trans('Code'),
            'type'     => trans('Voucher type'),
            'status'   => trans('Status'),
            'value'    => trans('Value'),
        ];
    }
}
