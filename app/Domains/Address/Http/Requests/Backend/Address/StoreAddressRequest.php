<?php

namespace App\Domains\Address\Http\Requests\Backend\Address;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreAddressRequest.
 */
class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the address is authorized to make this request.
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
            'build_num'=>'required',
            'street'=>'required',
            'area'=>'required',
            'city'=>'required',
            'zipcode'=>'required',
            'country'=>'required',
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