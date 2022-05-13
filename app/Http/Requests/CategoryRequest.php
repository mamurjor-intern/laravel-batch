<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status'    =>  false,
                'errors'    =>  $validator->errors()
            ], 200)
        );
    }


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
        $rules = [
            'category_name'   => ['required','string','max:100','unique:categories,name'],
            'category_icon'   => ['required','image','mimes:png,jpg,svg'],
            'parent_category' => ['required','integer'],
            'status'          => ['required','in:0,1']
        ];

        if (request()->update_id) {
            $rules['category_name'][3] = 'unique:categories,name,'.request()->update_id;
        }

        return $rules;
    }
}
