<?php

namespace App\Domains\Customer\Http\Requests\Backend\Customer;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCustomerRequest.
 */
class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the customer is authorized to make this request.
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
            'name'=>'required',
            'coming_date'=>'required',
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