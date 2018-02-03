<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Listas;

class Reportes extends Model
{
    //

    public function listas_de($fecha_i, $fecha_f){

        $listas = Listas::where([
            ['fecha','>=',$fecha_i],
            ['fecha','<=',$fecha_f]
        ])->get();

        return $listas;

    }

    public function asistencias_de($fecha_i, $fecha_f){

        $asistencias = DB::select("SELECT 
        `asis`.`id`,
        `asis`.`lista_id`,
        `asis`.`temporal_id`,
        `asis`.`entrada`,
        `asis`.`hr_entrada`,
        `asis`.`salida`,
        `asis`.`hr_salida`,
        `list`.`id`,
        `list`.`titulo`,
        `list`.`fecha`,
        `temp`.`rtt`,
        `temp`.`nombre_s`,
        `temp`.`apellido_paterno`,
        `temp`.`apellido_materno`,
        `temp`.`id` FROM `asistencias` `asis`
        INNER JOIN `temporales` `temp` ON `asis`.`temporal_id` = `temp`.`id`
        INNER JOIN `listas` `list` ON `asis`.`lista_id` = `list`.`id`
        WHERE `list`.`fecha` >= ? AND `list`.`fecha` <= ?",[$fecha_i,$fecha_f]);

        return $asistencias;

    }

}
