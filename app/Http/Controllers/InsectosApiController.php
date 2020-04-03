<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Insecto;

class InsectosApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $insectos = Insecto::all();

        $argumentos = array();
        $argumentos['insectos'] = $insectos;

        return view('insectos.index', $argumentos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $nuevoInsecto = new Insecto();
        //
        $nuevoInsecto->id_user = $request->user()->id;
        $nuevoInsecto->nombre = $request->input('nombre');
        $nuevoInsecto->descripcion = $request->input('descripcion');
        $nuevoInsecto->temporada = $request->input('temporada');
        $nuevoInsecto->donado = $request->input('donado');
        $nuevoInsecto->capturado = $request->input('capturado');
        $nuevoInsecto->ubicacion = $request->input('ubicacion');
        $nuevoInsecto->foto = $request->input('foto');
        $nuevoInsecto->fecha_capturado = $request->input('fecha_capturado');

        //Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;

        if($nuevoInsecto->save())
        {
            $respuesta['exito'] = true;
        }
        //Regresa una respuesta
        return $respuesta;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insecto = Insecto::find($id);

        $argumentos = array();
        $argumentos['insecto'] = $insecto;

        return view('insectos.show', $argumentos);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
