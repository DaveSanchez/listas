<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Listas;
use App\Asistencias;
use App\Reportes;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        Excel::create('Reporte de sistencias', function($excel){

            $excel->sheet('Listas', function($sheet){

                $listas = Listas::all();

                $sheet->fromArray($listas);

            })->export('xls');

        });

    }

    public function range($fi, $ff){
        
        Excel::create('Reporte de asistencias del '.$fi.' al '.$ff, function($excel) use($fi, $ff){
            
                        $excel->sheet('Asistencias', function($sheet) use($fi, $ff){
                        
                        $reportes = new Reportes;
        
                        $listas = $reportes->asistencias_de($fi, $ff);
                        
                        $data= json_decode( json_encode($listas), true);

                        $sheet->fromArray($data);
            
                        })->download('xls');
            
                    });



    }
}
