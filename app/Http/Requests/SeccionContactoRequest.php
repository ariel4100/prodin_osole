<?php

namespace App\Http\Requests;

use App\Rules\ValidRecaptcha;
use Illuminate\Foundation\Http\FormRequest;

class SeccionContactoRequest extends FormRequest
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
            'nombre'               => 'required | string ',
            'apellido'             => 'required | string ',
            'email'                => 'required | email',
            'condiciones'          => 'required',
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'ReCaptcha requerido!',
            'g-recaptcha-response.captcha'  => 'Captcha error! Inténtalo de nuevo!',
        ];
    }
}
