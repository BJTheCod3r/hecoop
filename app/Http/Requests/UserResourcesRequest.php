<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserResourcesRequest
 * 
 */
class UserResourcesRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * 
     * In the future we should do one or two things here.
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
            'q' => 'string|nullable',
            'completed' => 'bool',
            'sort' => 'in:ASC,DESC',
            'user_id' => 'nullable|exists:users,id'
        ];
    }
}
