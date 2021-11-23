<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignStoreRequest extends FormRequest
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
            'channel' => 'required|min:3|max:100',
            'campaign_name' => 'required|min:3|max:100',
            'source' => 'required|min:3|max:100',
            'target_url' => 'required|min:3|max:100',
            'user_id' => 'required|integer'
        ];
    }
}
