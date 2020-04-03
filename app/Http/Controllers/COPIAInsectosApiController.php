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
    public function index(Request $request)
    {
        $paginaActual = intval($request->input('pagina'));
        if(!$paginaActual){
            $paginaActual = 1;
        }

        $numeroInsectos = Insecto::count();
        $numeroPaginas = ceil($numeroInsectos / 20);
        $insectos = Insecto::where('id_user', $request->user()->id)->skip(($paginaActual - 1) * 20)->take(20)->get();
        
        //Construyo respuesta
        $respuesta = array();
        $respuesta['total'] = $numeroInsectos;
        $respuesta['paginas'] = $numeroPaginas;
        $respuesta['pagina_actual'] = $paginaActual;
        $respuesta['insectos'] = $insectos;

        //Envio respuesta
        return $respuesta;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
