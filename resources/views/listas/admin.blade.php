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
                                                
                            @if ($asistencia->entrada && $asistencia->salida)
                                @elseif (!$asistencia->entrada && !$asistencia->salida)
                                    <form method="POST" action="{{ route('asistencias.in') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="values" value="{{ $asistencia->temporal_id }}:{{ $asistencia->lista_id }}">
                                        <button class="btn btn-success btn-xs" onclick="this.disabled=true;this.form.submit();">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @elseif ($asistencia->entrada && !$asistencia->salida) 
                                    <form method="POST" action="{{ route('asistencias.out') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="values" value="{{ $asistencia->temporal_id }}:{{ $asistencia->lista_id }}">
                                        <button class="btn btn-danger btn-xs" onclick="this.disabled=true;this.form.submit();">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form>   
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

                                    <form method="POST" action="{{ route('asistencias.store') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="tid" value="{{ $temporal->id }}">
                                        <input type="hidden" name="lid" value="{{ $id }}">       
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="this.disabled=true;this.form.submit();">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr> 
                                    @endforeach
                            </tbody> 
                        </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


      @if (session('success'))
            <script>
            swal({
                text: "{{ session('success') }}",
                timer: 2000,
                icon: "success",
                button: false
            });
            
        </script>
    @endif
      
@endsection