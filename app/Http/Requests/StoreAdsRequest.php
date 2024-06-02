<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdsRequest extends FormRequest
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
            'customer' => ['required'],
            'customer_contact' => ['required'],
            'content' => ['required'],
            'image' => ['nullable'],
            'cta_text' => ['required'],
            'cta_link' => ['required'],
            'start_at' => ['required'],
            'end_at' => ['required']
        ];
    }
}
