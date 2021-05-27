<?php


namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StartLoginRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:50'],
        ];
    }
}
