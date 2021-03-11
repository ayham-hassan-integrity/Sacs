<?php

namespace App\Domains\ContactActivity\Http\Requests\Backend\ContactActivity;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreContactActivityRequest.
 */
class StoreContactActivityRequest extends FormRequest
{
    /**
     * Determine if the contactactivity is authorized to make this request.
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
            'contact_id'=>'required',
            'type_id'=>'required',
            'outcome_id'=>'required',
            'activity_date'=>'required',
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