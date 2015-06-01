<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (\Auth::user()->user_type == "Super Admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'min:3',
            'email' => 'email',
            'num_id' => 'numeric|min:8',
            'password' => 'min:6',
            'password_confirmation' => 'same:password'
        ];
    }
    
    public function messages() {
        return [
           
            'name.min'          => 'El nombre debe ser de minimo 3 caracteres.',
            'email'             => 'El correo no es válido',    
            'num_id.numeric'    => 'El número de indentificación debe ser numérico',
            'num_id.min'        => 'El número de identificación debe ser de mínimo 8 caracteres.',            
            'password.min'      => 'La clave debe ser de mínimo 6 caracteres.',        
            'password_confirmation.same'     => 'Las claves no coinciden.'
        ];
    }

}
