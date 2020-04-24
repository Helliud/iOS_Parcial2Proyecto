<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Usuarios;


class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $argumentos = array();
        $argumentos['usuarios'] = $usuarios;
        return view('admin.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verificacion = Usuarios::where('email', $request->input('email'))->first();

        if($verificacion){
            return redirect()->route('admin.create')->with('error', 'El usuario ' . $request->input('email') . ' ya existe');
        }

        $usuario = new Usuarios();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->tipo_usuario = $request->input('tipo_usuario');
        $usuario->password = bcrypt($request->input('password'));
        
        if($usuario->save())
        {
            //Si pude guardar la noticia
            return redirect()->route('admin.index')->with('exito','La noticia fue guardada correctamente');
        }
        //Aqui no se pudo guardar
        return redirect()->route('admin.index')->with('error','La noticia no fue guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);

        if($usuario){

            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.show', $argumentos);

        } 
        return redirect()->route('admin.index')->with('error', 'No se encontro la noticia');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::find($id);

        if($usuario){

            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.edit', $argumentos);

        } 
        return redirect()->route('admin.index')->with('error', 'No se encontro la noticia');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuarios::find($id);
        if($usuario){
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->tipo_usuario = $request->input('tipo_usuario');
            $usuario->password = bcrypt($request->input('password'));
    
            if($usuario ->save()){
                return redirect()->route('admin.index', $id)->with('exito', 'El usuario se actualizo exitosamente');

            }
            return redirect()->route('admin.edit', $id)->with('error', 'No se pudo actualizar el usuario');
        }
        return redirect()->route('admin.index')->with('error', 'No se encontro el usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        if($usuario){
            if($usuario->delete()){
                return redirect()->route('admin.index')->with('exito', 'Se pudo eliminar el usuario');
            }
            return redirect()-> route('admin.index')->with('error', 'No se pudo eliminar el usuario');
        }
        return redirect()-> route('admin.index')->with('error', 'No se encontro el usuario');
    }
}
