<?php

namespace App\Domains\Contact\Http\Requests\Backend\Contact;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateContactRequest.
 */
class UpdateContactRequest extends FormRequest
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

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('You can not update this record.'));
    }
}