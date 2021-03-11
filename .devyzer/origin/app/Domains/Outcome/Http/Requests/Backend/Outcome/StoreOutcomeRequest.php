<?php

namespace App\Domains\Outcome\Http\Requests\Backend\Outcome;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreOutcomeRequest.
 */
class StoreOutcomeRequest extends FormRequest
{
    /**
     * Determine if the outcome is authorized to make this request.
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