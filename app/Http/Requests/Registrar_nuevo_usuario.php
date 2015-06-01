<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Registrar_nuevo_usuario extends Request {

    /**
     * Determine if the user is authorized to make this request.
     * Temporalmente se dara libre acceso a este recurso
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
            'name'      => 'required|min:3',
            'email'     => 'required',
            'num_id'    => 'required|numeric|min:8',
            'password'  => 'required|min:6',
            'password_confirmation'  => 'required|same:password'
        ];
    }
    
    public function messages() {
        return [
            'name.required'     => 'Debe ingresar un nombre.',
            'name.min'          => 'El nombre debe ser de minimo 3 caracteres.',
            'email.required'    => 'Debe ingresar un correo electrónico.',
            'num_id.required'   => 'Debe ingresar el número de identificación',
            'num_id.numeric'    => 'El número de indentificación debe ser numérico',
            'num_id.min'        => 'El número de identificación debe ser de mínimo 8 caracteres.',
            'password.required' => 'Debe ingresar una clave.',
            'password.min'      => 'La clave debe ser de mínimo 6 caracteres.',
            'password_confirmation.required' => 'Debe confirmar la clave.',
            'password_confirmation.same'     => 'Las claves no coinciden.'
        ];
    }

}
