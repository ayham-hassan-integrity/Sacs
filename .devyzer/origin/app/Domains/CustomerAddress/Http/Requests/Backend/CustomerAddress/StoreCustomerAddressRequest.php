<?php

namespace App\Domains\CustomerAddress\Http\Requests\Backend\CustomerAddress;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCustomerAddressRequest.
 */
class StoreCustomerAddressRequest extends FormRequest
{
    /**
     * Determine if the customeraddress is authorized to make this request.
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
            'customer_id'=>'required',
            'address_id'=>'required',
            'rec_date'=>'required',
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