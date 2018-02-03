<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Temporales extends Model
{
    //campos que se deben de llenar (obligatorios)
    protected $fillable = [
        'rtt',
        'nombre_s',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nac',
        'direccion',
        'tel_personal',
        'tel_casa',
        'foto',
        'cijubila',
        'p25',
        'con_hijos',
        'alta',
        'deportes',
        'fecha_ing',
        'estado_civil',
        'especialidad',
        'cursos_deseados',
        'estudios',
        'puesto_actual',
        'tiempo_en_puesto',
        'delegado',
        'puestos_anteriores'
    ];

    public function notExistIn($list){

        //$sql = 'SELECT `id` FROM `temporales` WHERE NOT EXISTS(SELECT `id` as `idasistencia`, `temporal_id` FROM `asistencias` WHERE `temporal_id` = `temporales`.`id` AND `idasistencia` = ?)';
        
        $temporales = DB::select('SELECT `t`.* FROM `temporales` `t` WHERE NOT EXISTS (SELECT 1 FROM `asistencias` `a` WHERE `a`.`temporal_id` = `t`.`id` AND `a`.`lista_id` = ?) AND `t`.`alta` = 1',[$list]);
        
        return $temporales;
    }

}
