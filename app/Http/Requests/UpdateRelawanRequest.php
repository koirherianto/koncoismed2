<?php

namespace App\Http\Requests;

use App\Models\Relawan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRelawanRequest extends FormRequest
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
        $rules = Relawan::$rules;
        
        return $rules;
    }
}
