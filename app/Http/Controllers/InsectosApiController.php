<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Insecto;


class InsectosApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        if($fechaInicio && $fechaFin)
        {
            $insectos = Insecto::where('fecha_capturado','>=',$fechaInicio)->where('fecha_capturado','<=',$fechaFin)->get();

        }

        else
        {
            $insectos = Insecto::all();
        }
        return $insectos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insectos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $insecto = new Insecto();
        $insecto->id_user = $request->user()->id;
        $insecto->nombre = $request->input('nombre');
        $insecto->descripcion = $request->input('descripcion');
        $insecto->temporada = $request->input('temporada');
        $insecto->donado = $request->input('donado');
        $insecto->capturado = $request->input('capturado');
        $insecto->ubicacion = $request->input('ubicacion');
        $insecto->foto = $request->input('foto');
        $insecto->fecha_capturado = $request->input('fecha_capturado');
        $insecto->estado = $request->input('estado');


        if ($request->hasFile('foto')) {

            $archivoPortada = $request->file('foto');
            $rutaArchivo = $archivoPortada->store('public\assets\img\imgInsectos');
            $rutaArchivo = substr($rutaArchivo, 30);
            $insecto->foto = $rutaArchivo;

        }

        $argumentos = array();
        $argumentos['exito'] = false;
        if($insecto -> save()){
            $argumentos['exito'] = true;

        }    
        return $argumentos;
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

        if($insecto)
        {
            $argumentos = array();
            $argumentos['insecto'] = $insecto;
            return view('insectos.show', $argumentos);
        }
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
        $insecto = Insecto::find($id);
        if($insecto){
            $insecto->id_user = $request->user()->id;
            $insecto->nombre = $request->input('nombre');
            $insecto->descripcion = $request->input('descripcion');
            $insecto->temporada = $request->input('temporada');
            $insecto->donado = $request->input('donado');
            $insecto->capturado = $request->input('capturado');
            $insecto->ubicacion = $request->input('ubicacion');
            $insecto->fecha_capturado = $request->input('fecha_capturado');
            $insecto->estado = $request->input('estado');

            if ($request->hasFile('foto')) {

                $archivoPortada = $request->file('foto');
                $rutaArchivo = $archivoPortada->store('public\assets\img\imgInsectos');
                $rutaArchivo = substr($rutaArchivo, 30);
                $insecto->foto = $rutaArchivo;
    
            }

            $argumentos = array();
            $argumentos['exito'] = false;
            if($insecto -> save()){
                $argumentos['exito'] = true;
    
            }    
            return $argumentos;    
                
        }
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