<?php

namespace App\Domains\Type\Http\Requests\Backend\Type;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTypeRequest.
 */
class StoreTypeRequest extends FormRequest
{
    /**
     * Determine if the type is authorized to make this request.
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