<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asistencias extends Model
{
    
    protected $fillable = [
        'lista_id',
        'temporal_id',
        'entrada',
        'hr_entrada',
        'salida',
        'hr_salida'
    ];

    public function entrada($temp, $list){

        date_default_timezone_set('America/Mexico_City');
        
        $update = DB::table('asistencias')
        ->where([
            ['temporal_id','=',$temp],
            ['lista_id','=',$list]
        ])
        ->update(
            ['entrada' => 1, 'hr_entrada' => date("H:i:s",time())]
        );

        return $update;

    }

    public function salida($temp, $list){
        date_default_timezone_set('America/Mexico_City');
        
        $update = DB::table('asistencias')
        ->where([
            ['temporal_id','=',$temp],
            ['lista_id','=',$list]
        ])
        ->update(
            ['salida' => 1, 'hr_salida' => date("H:i:s",time())]
        );
        
        return $update;

    }

    public function hasthistemp($list, $temp){

        

               
                $find = DB::table('asistencias'
                )->where([
                    ['temporal_id','=',$temp],
                    ['lista_id','=',$list]
                ])->limit(1)->get();
                
        
                $exists = count($find)>0 ? true: false; 

                return $exists;
        
            }

}
