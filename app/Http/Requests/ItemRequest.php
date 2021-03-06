<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => ['required',
                'string',
                Rule::unique('items')->ignore($this->route('id')),
                'max:50'],
            'count' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'sometimes|nullable|min:3|max:2000'
        ];
    }
}
