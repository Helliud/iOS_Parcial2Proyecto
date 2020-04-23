<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Insecto;


class InsectosController extends Controller
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
    public function index(Request $request) {

        $criterio = $request->input('criterio');
        $insectos = array();

        if($criterio)
        {
            $insectos = Insecto::where('nombre','LIKE','%'.$criterio.'%')->get();
        } 
        else 
        {
            $insectos = Insecto::all();
        }

        $argumentos = array();
        $argumentos['insectos'] = $insectos;

        return view('insectos.index', $argumentos);
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

        if ($insecto->save()) {

            return redirect()->route('insectos.index')->with('exito', '¡La tarea ha sido guardada con éxito!');
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insecto = Insecto::find($id);

        if($insecto){

            $argumentos = array();
            $argumentos['insecto'] = $insecto;
            return view('insectos.edit', $argumentos);

        } 
        return redirect()->route('insectos.index')->with('error', 'No se encontro la noticia');
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
                
            if($insecto->save()){
                return redirect()->route('insectos.edit', $id)->with('exito', 'La noticia se actualizo exitosamente');

            }
            return redirect()->route('insectos.edit', $id)->with('error', 'No se pudo actualizar la noticia');
        }
        return redirect()->route('insectos.index')->with('error', 'No se encontro la noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insecto = Insecto::find($id);
        if($insecto){

            if($insecto->delete()){
                return redirect()->route('insectos.index')->with('exito', '¡Tarea eliminada exitosamente!');
            }
            return redirect()->route('insectos.index')->with('error', 'No se puedo eliminar la tarea');
        }
        return redirect()->route('insectos.index')->with('error', 'No se encontró la tarea');}
    }