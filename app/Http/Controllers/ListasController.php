<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Listas;
use App\Temporales;
use App\Asistencias;

class ListasController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
        $listas = Listas::all();

        return view('listas.index',compact('listas'));

    }

    public function store(Request $request){

        $messages = [
            'titulo.required' => 'El titulo es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'observaciones.required' => 'Las observaciones son obligatorias'
        ];

        $this->validate(request(),[
            'titulo' => 'required',
            'fecha' => 'required',
            'observaciones' => 'required'
        ],$messages);

        $listas = new Listas;

        $listas->titulo = $request->titulo;
        $listas->fecha = $request->fecha;
        $listas->observaciones = $request->observaciones;
        $create = $listas->save();

        $success = $create ? $request->session()->flash('success', '¡Registro exitoso!') : $request->session()->flash('success', 'Ooops! Algo salio mal :(');
        

        return redirect()->route('listas');

    }

    public function admin($id){
        

        //$asistencias = new Asistencias;
    
        //$asistencias = DB::table('asistencias')->join('temporales','asistencias.temporal_id','=','temporales.id')->where('id','=',$id)->get();
        $asistencias = DB::select('SELECT * FROM `asistencias` INNER JOIN `temporales` ON `asistencias`.`temporal_id` = `temporales`.`id` WHERE `lista_id` = ? ',[$id]);

        $lista = Listas::findOrFail($id);

        $temporales = new Temporales;

        $temporales = $temporales->notExistIn($id);

        return view('listas.admin', compact('asistencias','temporales','id','lista'));

    }

    public function show($id){

        $lista = Listas::findOrFail($id);

        return view('listas.show',compact('lista'));

    }

    public function update(Request $request){

        $messages = [
            'titulo.required' => 'El titulo es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'observaciones.required' => 'Las observaciones son obligatorias'
        ];

        $this->validate(request(),[
            'titulo' => 'required',
            'fecha' => 'required',
            'observaciones' => 'required'
        ],$messages);

        $listas = Listas::find($request->lid);

        $listas->titulo = $request->titulo;
        $listas->fecha = $request->fecha;
        $listas->observaciones = $request->observaciones;
        $create = $listas->save();

        $success = $create ? $request->session()->flash('success', '¡Lista actualizada!') : $request->session()->flash('success', 'Ooops! Algo salio mal :(');
        

        return redirect()->route('listas.show',[$request->lid]);

    }
    
}
