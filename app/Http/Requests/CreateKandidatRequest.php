<?php

namespace App\Http\Requests;

use App\Models\Kandidat;
use Illuminate\Foundation\Http\FormRequest;

class CreateKandidatRequest extends FormRequest
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
        return Kandidat::$rules;
    }
}
