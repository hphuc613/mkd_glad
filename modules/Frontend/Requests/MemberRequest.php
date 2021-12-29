<?php

namespace Modules\Frontend\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MemberRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'nullable',
            'username' => [
                'required',
                'regex:/(^([a-zA-Z0-9_.]+)(\d+)?$)/u',
                'validate_unique:members,' . Auth::id(),
            ],
            'email' => 'required|email|validate_unique:members,' . Auth::id(),
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'phone' => 'required|digits:8|nullable|validate_unique:members,' . Auth::id(),
            'password' => 'min:6|nullable',
            'password_re_enter' => 're_enter_password|required_with:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute' . trans(' can not be empty.'),
            'email' => ':attribute' . trans(' must be the email.'),
            'min' => ':attribute' . trans('  too short.'),
            're_enter_password' => trans('Wrong password'),
            'required_with' => ':attribute' . trans(' can not be empty.'),
            'validate_unique' => ':attribute' . trans(' was exist.'),
            'regex' => ':attribute' . trans(' contains invalid characters.'),
            'image' => ':attribute' . trans(' must be an image.'),
            'digits' => ':attribute' . trans(' must be 8 digits.'),
            'mimes' => ':attribute' .
                trans(' extention must be one of the following: jpeg, png, jpg, gif, svg.'),
            'check_exist' => ':attribute' . trans(' does not exist.'),
        ];
    }

    public function attributes()
    {
        return [
            'email' => trans('Email'),
            'password' => trans('Password'),
            'password_re_enter' => trans('Re-enter Password'),
            'name' => trans('Name'),
            'last_name' => trans('Last name'),
            'username' => trans('Username'),
            'phone' => trans('Phone'),
            'avatar' => trans('Avatar'),
        ];
    }
}
