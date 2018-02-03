<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reportes;

class ReportesController extends Controller
{
    //

    public function index(){

        return view('reportes.index');

    }

    public function generate(Reportes $reportes, Request $request){

        //$listas = $reportes->listas_de($request->fecha_inicial, $request->fecha_final);    
        $asistencias = $reportes->asistencias_de($request->fecha_inicial, $request->fecha_final); 
        
        $fi = $request->fecha_inicial;
        $ff = $request->fecha_final;
        
        return view('reportes.index', compact('asistencias','fi','ff'));
      
    }

}
