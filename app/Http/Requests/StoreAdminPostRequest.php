<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'        => 'required',
            'thumbnail'    => 'image',
            'slug'         => ['required', Rule::unique('posts', 'slug')->ignore('$post')],
            'excerpt'      => 'required',
            'body'         => 'required',
            'category_id'  => ['required', Rule::exists('categories', 'id')],
            'published_at' => 'requred'
        ];
    }
}
