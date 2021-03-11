<?php

namespace App\Domains\Status\Http\Requests\Backend\Status;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreStatusRequest.
 */
class StoreStatusRequest extends FormRequest
{
    /**
     * Determine if the status is authorized to make this request.
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
            'code'=>'required',
            'description'=>'nullable',
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