<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Temporales;

class TemporalesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function index(){

        $temporales = Temporales::where([
            ['alta','=',1]
        ])->get();

        return view('temporales.index',compact('temporales'));

    }

    public function store(Request $request){

        /*$foto = $request->foto;
            $foto->store('photos');
                //Storage::disk('local')->put($foto, 'Contents.jpg');
        
                die();*/

        $messages = [
            'rtt.unique' => 'La clave ya existe',
            'rtt.required' => 'La clave es obligatoria',
            'rtt.regex' => 'La clave es se compone de 2 letras seguido de 3 números',
            'clave.unique' => 'La clave ya esta registrada',
            'nombre.required' => 'El nombre es obligatorio',
            'ap.required' => 'El Apellido Paterno es obligatorio',
            'am.required' => 'El Apellido Materno es obligatorio',
            'tel_personal.digits' => 'El teléfono debe componerse de 10 digitos',
            'tel_casa.digits' => 'El teléfono debe componerse de 7 digitos',
            'email.email' => 'La estructura del correo no es valida',
            'foto.required' => 'La foto es obligatoria',
            'foto.image' => 'Este archivo no es una imagen',
            'fotos.mimes' => 'Solo se aceptan archivos jpeg, jpg y png',
            'deportes.required' => 'Este campo es obligatorio',
            'fecha_ing.required' => 'Este campo es obligatorio',
            'estado_civil.required' => 'Este campo es obligatorio',
            'especialidad.required' => 'Este campo es obligatorio',
            'cursos_m.required' => 'Este campo es obligatorio',
            'estudios.required' => 'Este campo es obligatorio',
            'puesto.required' => 'Este campo es obligatorio',
            'tiempo.required' => 'Este campo es obligatorio',
            'delegado.required' => 'Este campo es obligatorio',
            'puestos_a.required' => 'Este campo es obligatorio'
        ];

        $this->validate(request(),[
            'rtt' => 'required|regex:/^[a-zA-Z]{2}[0-9]{3}+$/|unique:temporales',
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'fecha_nac' => 'nullable',
            'tel_personal' => 'digits:10',
            'tel_casa' => 'nullable|digits:7',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
            'deportes' => 'required',
            'fecha_ing' => 'required',
            'estado_civil' => 'required',
            'especialidad' => 'required',
            'cursos_m' => 'required',
            'estudios' => 'required',
            'puesto' => 'required',
            'tiempo' => 'required',
            'delegado' => 'required',
            'puestos_a' => 'required'
        ],$messages);

        $temporales = new Temporales;

        $temporales->rtt = $request->rtt;
        $temporales->nombre_s = $request->nombre;
        $temporales->apellido_paterno = $request->ap;
        $temporales->apellido_materno = $request->am;
        $temporales->fecha_nac = $request->fecha_nac;
        $temporales->direccion = $request->direccion;
        $temporales->tel_personal = $request->tel_personal;
        $temporales->tel_casa = $request->tel_casa;
        $temporales->cijubila = ($request->cijubila === 'checked') ? 1 : 0;
        $temporales->p25 = ($request->p25 === 'checked') ? 1 : 0;       
        $temporales->foto = $request->file('foto')->store('photos');
        $temporales->con_hijos = ($request->con_hijos === 'checked') ? 1 : 0;
        $temporales->alta = 1;        
        $temporales->deportes = $request->deportes;
        $temporales->fecha_ing = $request->fecha_ing;
        $temporales->estado_civil = $request->estado_civil;
        $temporales->especialidad = $request->especialidad;
        $temporales->cursos_deseados = $request->cursos_m;
        $temporales->estudios = $request->estudios;
        $temporales->puesto_actual = $request->puesto;
        $temporales->tiempo_en_puesto = $request->tiempo;
        $temporales->delegado = $request->delegado;
        $temporales->puestos_anteriores = $request->puestos_a;
        $create = $temporales->save();
        
        $success = $create ? $request->session()->flash('success', '¡Registro exitoso!') : $request->session()->flash('success', 'Ooops! Algo salio mal :(');
        
        return redirect()->route('temporales');

    }

    public function show($id){

        $temporal = Temporales::findOrFail($id);


        return view('temporales.show',compact('temporal'));

    }

    public function update(Request $request){

        $messages = [
            'rtt.required' => 'La clave es obligatoria',
            'rtt.regex' => 'La clave es se compone de 2 letras seguido de 3 números',
            'clave.unique' => 'La clave ya esta registrada',
            'nombre.required' => 'El nombre es obligatorio',
            'ap.required' => 'El Apellido Paterno es obligatorio',
            'am.required' => 'El Apellido Materno es obligatorio',
            'tel_personal.digits' => 'El teléfono debe componerse de 10 digitos',
            'tel_casa.digits' => 'El teléfono debe componerse de 7 digitos',
            'foto.image' => 'Este archivo no es una imagen',
            'fotos.mimes' => 'Solo se aceptan archivos jpeg, jpg y png',
            'deportes.required' => 'Este campo es obligatorio',
            'fecha_ing.required' => 'Este campo es obligatorio',
            'estado_civil.required' => 'Este campo es obligatorio',
            'especialidad.required' => 'Este campo es obligatorio',
            'cursos_m.required' => 'Este campo es obligatorio',
            'estudios.required' => 'Este campo es obligatorio',
            'puesto.required' => 'Este campo es obligatorio',
            'tiempo.required' => 'Este campo es obligatorio',
            'delegado.required' => 'Este campo es obligatorio',
            'puestos_a.required' => 'Este campo es obligatorio'
        ];

        $this->validate(request(),[
            'rtt' => 'required|regex:/^[a-zA-Z]{2}[0-9]{3}+$/',
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'fecha_nac' => 'nullable',
            'tel_personal' => 'digits:10',
            'tel_casa' => 'nullable|digits:7',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png',
            'deportes' => 'required',
            'fecha_ing' => 'required',
            'estado_civil' => 'required',
            'especialidad' => 'required',
            'cursos_m' => 'required',
            'estudios' => 'required',
            'puesto' => 'required',
            'tiempo' => 'required',
            'delegado' => 'required',
            'puestos_a' => 'required'
        ],$messages);

        $temporales = Temporales::find($request->idtemp);
        
        $temporales->rtt = $request->rtt;
        $temporales->nombre_s = $request->nombre;
        $temporales->apellido_paterno = $request->ap;
        $temporales->apellido_materno = $request->am;
        $temporales->fecha_nac = $request->fecha_nac;
        $temporales->direccion = $request->direccion;
        $temporales->tel_personal = $request->tel_personal;
        $temporales->tel_casa = $request->tel_casa;
        $temporales->cijubila = ($request->cijubila === 'checked') ? 1 : 0;
        $temporales->p25 = ($request->p25 === 'checked') ? 1 : 0;       
        $temporales->foto = ($request->hasFile('foto')) ? $request->file('foto')->store('photos') : $temporales['foto'];
        $temporales->con_hijos = ($request->con_hijos === 'checked') ? 1 : 0;
        $temporales->deportes = $request->deportes;
        $temporales->fecha_ing = $request->fecha_ing;
        $temporales->estado_civil = $request->estado_civil;
        $temporales->especialidad = $request->especialidad;
        $temporales->cursos_deseados = $request->cursos_m;
        $temporales->estudios = $request->estudios;
        $temporales->puesto_actual = $request->puesto;
        $temporales->tiempo_en_puesto = $request->tiempo;
        $temporales->delegado = $request->delegado;
        $temporales->puestos_anteriores = $request->puestos_a;
        $update = $temporales->save();
        
        $success = $update ? $request->session()->flash('success', '¡Actualización exitosa!') : $request->session()->flash('success', 'Ooops! Algo salio mal :(');
        
        return redirect()->route('temporales.show', [$request->idtemp]);
    }

    public function disable(Request $request){

        $temporales = Temporales::find($request->idtemp);
        $temporales->alta = 0;
        $update = $temporales->save();
        
        $success = $update ? $request->session()->flash('success', '¡Baja exitosa!') : $request->session()->flash('success', 'Ooops! Algo salio mal :(');
        
        return redirect()->route('temporales.show', [$request->idtemp]);

    }

}
