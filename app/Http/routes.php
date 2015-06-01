<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|
*/

/*** 	WelcomeController ***/

Route::get('inicio', 'WelcomeController@index');
Route::get('quienes-somos', 'WelcomeController@about_us');
Route::get('vacantes', 'WelcomeController@vacantes');
Route::get('nuestras-clinicas/traumatologia', 'WelcomeController@sede_traumatologia');
Route::get('nuestras-clinicas/materno_infantil', 'WelcomeController@sede_materno_infantil');
Route::get('nuestras-clinicas/pacientes_cronicos', 'WelcomeController@sede_pacientes_cronicos');
Route::get('contacto', 'WelcomeController@contacto');
Route::post('contacto', 'WelcomeController@sendMsg');
Route::get('galeria', 'WelcomeController@galeria');

/*** InfoController ***/

Route::get('info', 'InfoController@index');
Route::get('info/form_certificado_pagos_profesionales', 'InfoController@form_certificado_pagos_profesionales');
Route::post('info/certificado_pagos_profesionales', 'InfoController@certificado_pagos_profesionales');
Route::get('info/pdf', 'InfoController@generatePdf');
Route::get('info/form_pago_proveedores', 'InfoController@form_pago_proveedores');
Route::post('info/pago_proveedores', 'InfoController@pago_proveedores');
Route::get('info/form_certificado_ica', 'InfoController@form_certificado_ica');
Route::post('info/certificado_ica', 'InfoController@certificado_ica');
Route::get('info/censo', 'InfoController@censo');


Route::get('auth/register', ['middleware' => 'manager', function(){
    return view('auth.register');
}]);
Route::post('register', 'UserController@register');

/*** UserController ***/

//Restringir el uso de este recurso!!

//Route::get('usuarios', ['middleware' => 'manager', function(){
//    return view('user.index');
//}]);
Route::get('usuarios', 'UserController@index'); // Temporalmente

Route::post('usuarios/{id}/update', 'UserController@update');
Route::get('usuarios/{id}/edit', 'UserController@edit');
Route::get('usuarios/{id}/delete', 'UserController@delete');

//Route::resource('usuarios', 'UserController');

Route::get('censo/{p}', 'CensoController@censo');

Route::get('contactos', 'ContactController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*** Home Controller (test)***/

Route::get('ajax', 'HomeController@index');

Route::post('terceros_por_letra', 'HomeController@get_terceros_by_letter');