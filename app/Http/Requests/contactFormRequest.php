<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class contactFormRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'          => 'required|min:3',
            'email'         => 'required|email',
            'asunto'        => 'required',
            'departamento'  => 'required',
            'mensaje'       => 'required'       
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'     => 'Debe ingresar un nombre',
            'name.alpha'        => 'Solo se admiten letras en el nombre. Verifique',
            'name.min'          => 'El nombre debe tener minimo 3 letras',
            'email.required'    => 'Debe ingresar un correo',
            'email.email'       => 'Correo enválido',
            'asunto.required'   => 'Debe ingresar un asunto',
            'asunto.alpha_num'  => 'Solo se admiten números y letras en el asunto. Verifique',
            'departamento.required' => 'Debe elegir un departamento.',
            'mensaje.required'  => 'Debe ingresar un mensaje.'   
        ];
    }

}
