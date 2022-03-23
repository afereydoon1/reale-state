<?php

namespace App\Http\Requests\Admin\Advertising;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'description' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'address' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'amount' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'floor' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'year' => 'required|digits:4|integer|min:1300|max:'.(date('Y')+1),
                'storeroom' => 'required|numeric|in:0,1',
                'balcony' => 'required|numeric|in:0,1',
                'room' => 'required|integer',
                'parking' => 'required|numeric|in:0,1',
                'toilet' => 'required|numeric|in:0,1,2',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:post_categories,id',
                'sell_status' => 'required|numeric|in:0,1,2',
                'status' => 'required|numeric|in:0,1',
                'type' => 'required|numeric|in:0,1,2,3',
                'area' => 'required|numeric',
            ];
        }
        else{
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'description' => 'required|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'address' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'amount' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'floor' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'year' => 'required|digits:4|integer|min:1300|max:'.(date('Y')+1),
                'storeroom' => 'required|numeric|in:0,1',
                'balcony' => 'required|numeric|in:0,1',
                'room' => 'required|integer',
                'parking' => 'required|numeric|in:0,1',
                'toilet' => 'required|numeric|in:0,1,2',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:post_categories,id',
                'sell_status' => 'required|numeric|in:0,1,2',
                'status' => 'required|numeric|in:0,1',
                'type' => 'required|numeric|in:0,1,2,3',
                'area' => 'required|numeric',
            ];
        }
    }

}
