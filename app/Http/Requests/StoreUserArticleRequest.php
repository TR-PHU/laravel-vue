<?php

namespace App\Http\Requests;

use App\Rules\ValidDateRule;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class StoreUserArticleRequest extends FormRequest
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
            'title' => 'required|min:6',
            'valid_date' => new ValidDateRule()
        ];
    }
}
