<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajesApiController extends Controller
{
    public function mensajeCapturador()
    {
        return ['mensajes' => "Esta ruta es solo para capturadores"]; 
    }
}
