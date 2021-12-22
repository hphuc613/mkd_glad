<?php

namespace Modules\Offer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'title' => 'nullable',
            'content' => 'nullable',
            'month' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'image' => ':attribute' . trans(' must be an image.'),
            'mimes' => ':attribute' .
                trans(' extention must be one of the following: jpeg, png, jpg, gif, svg.'),
        ];
    }

    public function attributes()
    {
        return [
            'title'   => 'Title',
            'content'  => 'Content',
            'month'  => 'Month',
            'image'   => 'Image'
        ];
    }
}
