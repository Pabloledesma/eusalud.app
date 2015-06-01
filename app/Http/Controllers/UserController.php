<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Muestra todos los usuarios
     * @return response
     */
    public function index() {

        $usuarios = User::all();
        return view('user.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario de edición para el usuario seleccionado
     * @param type $id
     */
    public function edit($id) {

        $user = User::findOrFail($id);
        $title = "Editando el usuario: ";
        $url = "usuarios/" . $id . "/update";
        $boton = "Editar";
        return view('user.edit', compact('user', 'title', 'url', 'boton'));
    }

    /**
     * Actualiza el usuario
     * @param type $id
     */
    public function update(Requests\EditUserRequest $req, $id) {
        $user = User::findOrFail($id);
        $input = $req->all();
        if (isset($input['password'])) {
            //Encriptar password
            $options = [
                'cost' => 7,
                'salt' => 'BCryptRequires22Chrcts',
            ];

            $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT, $options);
        } 

        $user->update($input);
        flash()->overlay('El usuario se actualizó correctamente', 'Buen trabajo!');
        return redirect('usuarios');
    }

    public function register(Requests\Registrar_nuevo_usuario $request) {
        $input = $request->all();
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->num_id = $input['num_id'];
        $user->user_type = $input['user_type'];

        //Encriptar password
        $options = [
            'cost' => 7,
            'salt' => 'BCryptRequires22Chrcts',
        ];

        $user->password = password_hash($input['password'], PASSWORD_BCRYPT, $options);
        $user->save();

        flash()->overlay('El usuario '. $user->name .' fue registrado correctamente', 'Registro');
        
        return redirect('usuarios');
    }
    
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash()->overlay('El usuario se elimino correctamente', 'Uno menos.');
        return redirect('usuarios');
    }

}
