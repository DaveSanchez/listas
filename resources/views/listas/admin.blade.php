@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px 0px 20px 0px;">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nva_asist">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Nuevo
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="<col-md-12></col-md-12>">
            <input type="hidden" id="in" value="{{ route('asistencias.in') }}">
            <input type="hidden" id="out" value="{{ route('asistencias.out') }}">
            <table class="datatable table table-bordered table-striped table-condensed table-responsive"> 
                <thead> 
                    <tr> 
                        <th>#</th>
                        <th class="text-center">RTT</th> 
                        <th class="text-center">Nombre completo</th> 
                        <th class="text-center">Entrada</th> 
                        <th class="text-center">Salida</th> 
                        <th class="text-center">*</th> 
                    </tr> 
                </thead> 
                <tbody> 
                        <?php $i = 1 ?>
                        
                        @foreach ($asistencias as $asistencia)
                    <tr class="text-center"> 
                            <th scope="row"><?=$i++?></th>
                            
                        <td>{{ $asistencia->rtt }}</td> 
                        <td>{{ $asistencia->nombre_s }} {{ $asistencia->apellido_paterno }} {{ $asistencia->apellido_materno }}</td> 
                        <td>
                            
                            @if ($asistencia->entrada) 
                                <i class="text-success fa fa-check" aria-hidden="true"></i>
                            @else
                                    <i class="text-danger fa fa-close" aria-hidden="true"></i>
                            @endif
                        </td> 
                        <td>
                                @if ($asistencia->salida) 
                                <i class="text-success fa fa-check" aria-hidden="true"></i>
                            @else
                                    <i class="text-danger fa fa-close" aria-hidden="true"></i>
                            @endif    
                        </td> 
                        <td>
                            @if ($asistencia->entrada)
                                @else
                                <a href="#" temp="{{ $asistencia->temporal_id }}:{{ $asistencia->lista_id }}" class="text-success btn-entrada tooltiplink" data-toggle="tooltip" data-placement="top" title="Entrada">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                </a>
                            @endif
                            @if ($asistencia->salida)
                                @else
                                <a href="#" temp="{{ $asistencia->temporal_id }}:{{ $asistencia->lista_id }}" class="text-danger btn-salida tooltiplink" data-toggle="tooltip" data-placement="top" title="Salida">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                </a>
                            @endif
                        </td>
                    </tr> 
                        @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="nva_asist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Agregar Temporal</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="storetemp" value="{{ route('asistencias.store') }}">
            <input type="hidden" id="check" value="{{ route('asistencias.check') }}">
            
                    <table class="datatable table table-bordered table-striped table-condensed table-responsive"> 
                            <thead> 
                                <tr> 
                                    <th class="text-center">RTT</th>
                                    <th class="text-center">Nombre completo</th> 
                                    <th class="text-center">*</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                    @foreach ($temporales as $temporal)
                                <tr class="text-center" temp="{{ $temporal->id }}:{{ $id }}"> 
                                    <td>{{ $temporal->rtt }}</td>
                                    <td>{{ $temporal->nombre_s }} {{ $temporal->apellido_paterno }} {{ $temporal->apellido_materno }}</td> 
                                    <td>
                                        <a class="btn-addtemp btn btn-primary">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr> 
                                    @endforeach
                            </tbody> 
                        </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="btn_save_list" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      
@endsection