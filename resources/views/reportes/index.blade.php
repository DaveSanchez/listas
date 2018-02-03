@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px 0px 20px 0px;">
                <form class="form-inline" action="{{ route('reportes.generate') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                          <label for="fecha_inicial">Fecha Inicial</label>
                          <input type="date" class="form-control" name="fecha_inicial" id="fecha_inicial">
                        </div>
                        <div class="form-group">
                          <label for="fecha_final">Fecha Final</label>
                          <input type="date" class="form-control" name="fecha_final" id="fecha_final">
                        </div>
                        <!--<div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control">
                                    <option value="1">Sin Faltas</option>
                                    <option value="0">Con Faltas</option>
                            </select>
                        </div>-->
                        <button type="submit" class="btn btn-default">Buscar</button>
                      </form>
        </div>
    </div>
    @isset($asistencias)
       
    <a target="_blank" href="{!! route('reporte.asistencias',['fi' => $fi,'ff' => $ff ]) !!}">
        Excel
    </a>
    <div class="container">
            <div class="row">
                <div class="<col-md-12></col-md-12>">
                    <table class="datatable table table-bordered table-striped table-condensed table-responsive"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th class="text-center">Titulo</th> 
                                <th class="text-center">Fecha</th> 
                                <th class="text-center">Temporal</th> 
                                <th class="text-center">Entrada</th> 
                                <th class="text-center">Salida</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                                <?php $i = 1 ?>
                                @foreach ($asistencias as $asis)
                            <tr class="text-center"> 
                                    <th scope="row"><?=$i++?></th>
                                <td>{{ $asis->titulo }}</td> 
                                <td>{{ $asis->fecha }}</td> 
                                <td>{{ $asis->nombre_s }} {{ $asis->apellido_paterno }} {{ $asis->apellido_materno }}</td> 
                                <td>@if ($asis->entrada) 
                                        si
                                         @else no
                                    @endif
                                </td>
                                <td>@if ($asis->salida) 
                                        si
                                         @else no
                                    @endif</td>                       
                            </tr> 
                                @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    @endisset
    <!--@isset($listas)
    <div class="container">
            <div class="row">
                <div class="<col-md-12></col-md-12>">
                    <table class="datatable table table-bordered table-striped table-condensed table-responsive"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th class="text-center">Titulo</th> 
                                <th class="text-center">Fecha</th> 
                                <th class="text-center">Observaciones</th> 
                                <th class="text-center">Administrar</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                                @foreach ($listas as $lista)
                            <tr class="text-center"> 
                                <th scope="row">{{ $lista->id }}</th> 
                                <td>{{ $lista->titulo }}</td> 
                                <td>{{ $lista->fecha }}</td> 
                                <td>{{ $lista->observaciones }}</td>
                                <td>
                                    <a href="{!! route('listas.admin',['id' => $lista->id]) !!}">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>                                 
                                    </a>
                                </td>                         
                            </tr> 
                                @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    @endisset-->
</div>

<hr>
     
@endsection