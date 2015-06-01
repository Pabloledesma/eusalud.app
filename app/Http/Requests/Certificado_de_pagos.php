<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class Certificado_de_pagos extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        /*
          if(Auth::user()){
          return true;
          } else {
          return false;
          } */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = array(
            'fecha_inicio' => 'required'
            //'fecha_final' => 'required|after:fecha_inicio'
        );
        if( \Auth::user()->user_type == 'Super Admin' || \Auth::user()->user_type == 'Admin' ){
            array_push($rules, ['num_id' => 'required|numeric']);
        }
        return $rules;
    }

    /*
     * Mensages personalizados
     * @return array
     */

    public function messages() {

        return [

            'fehca_inicial.required' => 'Debe diligenciar la fecha inicial',
            'fecha_final.required' => 'Debe diligenciar la fecha final',
            'fecha_final.after' => 'La fecha final debe ser mayor que la fecha inicial.'
        ];
    }

}
