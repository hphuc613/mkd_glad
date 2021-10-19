<?php

namespace Modules\Coupon\Requests;

use App\AppHelpers\Helper;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
                    'code'   => 'required|validate_unique:coupons',
                    'status' => 'required',
                ];
                break;
            case 'update':
                return [
                    'code'   => 'required|validate_unique:coupons,' . $this->id,
                    'status' => 'required',
                ];
                break;
        }
    }

    public function messages() {
        return [
            'required'        => ':attribute' . trans(' can not be empty.'),
            'validate_unique' => ':attribute' . trans(' was exist.')
        ];
    }

    public function attributes() {
        return [
            'code'        => trans('Code'),
            'status'      => trans('Status'),
        ];
    }
}
