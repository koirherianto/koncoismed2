<?php

namespace App\Http\Requests;

use App\Models\LogHarian;
use Illuminate\Foundation\Http\FormRequest;
use App\User;

class ChangePasswordUserRequest extends FormRequest
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
            'password' => ['required', 'string', 'different:password_new'],
            'password_new' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
