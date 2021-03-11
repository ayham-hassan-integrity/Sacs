<?php

namespace App\Domains\Contact\Http\Requests\Backend\Contact;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreContactRequest.
 */
class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the contact is authorized to make this request.
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
            'image_file'=>'nullable',
            'name'=>'required',
            'customer_id'=>'required',
            'status_id'=>'required',
            'email'=>'required|email',
            'web_sit'=>'nullable',
            'phone'=>'nullable',
            'mobile'=>'nullable',
            'fax'=>'nullable',
            'details'=>'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}