<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use App\Validation;

class InlineRequest extends FormRequest
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
     * Get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules()
    {
        $validate = [];

        /**
         * Get data from fields submitted
         * - Called via inline (1 field) & final submission (all fields)
         */
        $data = json_decode($this->content);

        /**
         * Standard validation rules from \App\Validation
         */
        $rules = Validation::RULES;

        /**
         * Custom validation rules
         * - add after standard Validation::RULES have been applied
         * - flag optional fields as nullable
         */
        $rules['email'] = 'email';
        $rules['address'] = 'min:5|nullable';
        $rules['hotel_name'] = 'min:2';
        $rules['hotel_desc'] = 'min:2';

        /**
         * Only validate the fields that have been filled in
         */
        foreach($data as $key => $val) {
            if(array_key_exists('inline', $data)) {
                /**
                 * Only return fields that have a value
                 */
                if($val && $key != 'inline') {
                    $validate[$key] = $rules[$key];
                }
            } else {
                /**
                 * Return all fields that require validation
                 */
                $validate[$key] = $rules[$key];
            }
        }

       return $validate;

    }

    /**
     * Custom validation messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'unique' => 'You need to be more original.... that ones already taken ;)'
        ];
    }
}
