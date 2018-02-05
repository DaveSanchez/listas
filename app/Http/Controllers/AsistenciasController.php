<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencias;
use App\Temporales;

class AsistenciasController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

       public function index(){
        $sql = 'SELECT `id` FROM `temporales` WHERE NOT EXISTS(SELECT `temporal_id` FROM `asistencias` WHERE `temporal_id` = `temporales`.`id`)';

        $asistencias = Asistencias::all();
    }

    public function store(Request $request){
       
        $asistencias = new Asistencias;

        $data = explode(':',$request->values);
        $temporal_id = $data[0];
        $lista_id = $data[1];

 
        $asistencias->lista_id = $lista_id; 
        $asistencias->temporal_id = $temporal_id;
        $asistencias->entrada = 0; 
        $asistencias->hr_entrada = '00:00:00';
        $asistencias->salida = 0;
        $asistencias->hr_salida = '00:00:00';
        
        $success = $asistencias->save() ? true: false;

        if($success){

            $falta = Temporales::find($temporal_id);
            $falta->increment('faltas',1,['id' => $temporal_id]);

            $request->session()->flash('success', '¡Temporal agregado!');

        }else {
            $request->session()->flash('success', '¡Ooops algo salio mal!');
        }
        

        return redirect()->route('listas.admin',[$lista_id]);

    }

    public function in(Request $request){
        
        $asistencias = new Asistencias;
        
        $data = explode(':',$request->values);
        $temporal_id = $data[0];
        $lista_id = $data[1];
        
        $success = $asistencias->entrada($temporal_id, $lista_id) ? true: false;

        if($success){

            $request->session()->flash('success', '¡Ingreso registrado!');

        }else {
            $request->session()->flash('success', '¡Ooops algo salio mal!');
        }

        return redirect()->route('listas.admin',[$lista_id]);
        

    }

    public function out(Request $request){
        $asistencias = new Asistencias;
        
        $data = explode(':',$request->values);
        $temporal_id = $data[0];
        $lista_id = $data[1];
        
        $success = $asistencias->salida($temporal_id, $lista_id) ? true: false;

        if($success){

            $falta = Temporales::find($temporal_id);
            $falta->increment('asistencias',1,['id' => $temporal_id]);
            $falta->decrement('faltas',1,['id' => $temporal_id]);
            $request->session()->flash('success', '¡Salida registrada!');            
            
        }else {
            $request->session()->flash('success', '¡Ooops algo salio mal!');
        }

        return redirect()->route('listas.admin',[$lista_id]);

    }

    public function check(Request $request){

        $asistencias = new Asistencias;
        
                $data = explode(':',$request->values);
                $temporal_id = $data[0];
                $lista_id = $data[1];
        
                $exists = $asistencias->hasthistemp($lista_id, $temporal_id) ? true: false;

        return json_encode(['success' => $exists]);
        

    }

}
