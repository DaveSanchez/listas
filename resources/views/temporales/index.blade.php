@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px 0px 20px 0px;">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nvo_temp">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Nuevo
            </button>
           
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="overflow:scroll;margin-bottom:20px;">
            <table class="datatable table table-bordered table-striped table-condensed table-responsive"> 
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th class="text-center">Foto</th>
                        <th class="text-center">RTT</th>
                        <th class="text-center">Nombre completo</th> 
                        <th class="text-center">Fecha de Nacimiento</th> 
                        <th class="text-center">Dirección</th> 
                        <th class="text-center">Telefono</th> 
                        <th class="text-center">Asistencias</th> 
                        <th class="text-center">Faltas</th> 
                        <th class="text-center">cijubila</th> 
                        <th class="text-center">25%</th> 
                        <th class="text-center">Con Hijos</th> 
                        <th class="text-center">Deportes</th> 
                        <th class="text-center">Cursos que desea recibir</th> 
                        <th class="text-center">Fecha de Ingreso</th> 
                        <th class="text-center">Estado Civil</th> 
                        <th class="text-center">Especialidad</th> 
                        <th class="text-center">Puesto Actual</th> 
                        <th class="text-center">Tiempo en puesto</th> 
                        <th class="text-center">Puestos Anteriores</th> 
                        <th class="text-center">Delegado</th> 
                        <th>*</th>
                    </tr> 
                </thead> 
                <tbody> 
                        <?php $i = 1 ?>
                        @foreach ($temporales as $temporal)
                    <tr class="text-center"> 
                        <th scope="row"><?=$i++?></th> 
                        <td>
                            <a href="{{ $temporal->foto }}" target="_blank">
                                <img width="80px" src="{{ $temporal->foto }}" class="img-responsive img-circle" alt="Avatar" />
                            </a>
                        </td>
                        <td>{{ $temporal->rtt }}</td>                       
                        <td>{{ $temporal->nombre_s }} {{ $temporal->apellido_paterno }} {{ $temporal->apellido_materno }}</td> 
                        <td>{{ $temporal->fecha_nac }}</td> 
                        <td>{{ $temporal->direccion }}</td> 
                        <td>
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            {{ $temporal->tel_personal }}
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ $temporal->tel_casa }}
                        </td>
                        <td>{{ $temporal->asistencias }}</td>
                        <td>{{ $temporal->faltas }}</td> 
                        <td> 
                            @if ($temporal->cijubila)
                                si
                                @else
                                no
                            @endif
                        </td>
                        <td>
                            @if ($temporal->p25)
                                si
                                @else
                                no
                            @endif
                        </td>
                        <td>
                            @if ($temporal->con_hijos)
                                si
                                @else
                                no
                            @endif
                        </td>
                        <td>
                            {{ $temporal->deportes }}                        
                        </td>
                        <td>
                            {{ $temporal->cursos_deseados }} 
                        </td>
                        <td>
                            {{ $temporal->fecha_ing }} 
                        </td>
                        <td>
                            {{ $temporal->estado_civil }} 
                        </td>
                        <td>
                            {{ $temporal->especialidad }} 
                        </td>
                        <td>
                            {{ $temporal->puesto_actual }} 
                        </td>
                        <td>
                            {{ $temporal->tiempo_en_puesto }} 
                        </td>
                        <td>
                            {{ $temporal->puestos_anteriores }} 
                        </td>
                        <td>
                            {{ $temporal->delegado }} 
                        </td>
                        <td>
                            <a href="{!! route('temporales.show',['id' => $temporal->id]) !!}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>                                   
                            </a>
                        </td>
                    </tr> 
                        @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nvo_temp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Nuevo temporal</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" id="frm_save_temp" action="{{ route('temporales.store') }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group {{ $errors->has('rtt') ? ' has-error' : '' }}">
                                        <label class="control-label" for="rtt">RTT</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                        <input aria-describedby="helpBlock1" type="text" class="clave_Temp form-control" id="rtt" name="rtt" value="{{ old('rtt') }}">
                                        @if ($errors->has('rtt'))
                                        <span id="helpBlock1" class="help-block text-danger">
                                            {{ $errors->first('rtt') }}
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                        <label class="control-label" for="nombre">Nombre(s)</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                        <input aria-describedby="helpBlock2" type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                                        @if ($errors->has('nombre'))
                                        <span id="helpBlock2" class="help-block text-danger">
                                            {{ $errors->first('nombre') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->has('ap') ? ' has-error' : '' }}">
                                        <label class="control-label" for="ap">Apellido Paterno</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                        <input aria-describedby="helpBlock3" type="text" class="form-control" id="ap" name="ap" value="{{ old('ap') }}">
                                        @if ($errors->has('ap'))
                                        <span id="helpBlock3" class="help-block text-danger">
                                            {{ $errors->first('ap') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group {{ $errors->has('am') ? ' has-error' : '' }}">
                                            <label class="control-label" for="am">Apellido Materno</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                            <input aria-describedby="helpBlock4" type="text" class="form-control" id="am" name="am" value="{{ old('am') }}">
                                            @if ($errors->has('am'))
                                            <span id="helpBlock4" class="help-block text-danger">
                                                {{ $errors->first('am') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label  for="fecha_nac">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac') }}">
                                            </div>
                                        </div>
                                </div>
                                <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <textarea class="form-control" name="direccion" id="direccion" rows="2" value="{{ old('direccion') }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('tel_personal') ? ' has-error' : '' }}">
                                                    <label class="control-label" for="tel_personal">Teléfono personal</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                    <input aria-describedby="helpBlock5" type="text" class="form-control" id="tel_personal" name="tel_personal" value="{{ old('tel_personal') }}">
                                                    @if ($errors->has('tel_personal'))
                                                    <span id="helpBlock5" class="help-block text-danger">
                                                        {{ $errors->first('tel_personal') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('tel_casa') ? ' has-error' : '' }}">
                                                    <label class="control-label" for="tel_casa">Teléfono de Casa</label>
                                                    <input aria-describedby="helpBlock6" type="text" class="form-control" id="tel_casa" name="tel_casa" value="{{ old('tel_casa') }}">
                                                    @if ($errors->has('tel_casa'))
                                                    <span id="helpBlock6" class="help-block text-danger">
                                                        {{ $errors->first('tel_casa') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                                <label class="control-label" for="foto">Foto</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                <input aria-describedby="helpBlock8" type="file" name="foto" id="foto" class="form-control" value="{{ old('foto') }}">
                                                @if ($errors->has('foto'))
                                                <span id="helpBlock8" class="help-block text-danger">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group  {{ $errors->has('deportes') ? ' has-error' : '' }}">
                                                    <label for="deportes">Deportes que practicas</label><span class="text-danger">
                                                    <textarea class="form-control" name="deportes" id="deportes" rows="2">{{ old('deportes') }}</textarea>
                                                    @if ($errors->has('deportes'))
                                                    <span id="helpBlock8" class="help-block text-danger">
                                                        {{ $errors->first('deportes') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="cijubila"  value="checked" type="checkbox"> cijubila
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="p25" value="checked" type="checkbox"> 25%
                                                    </label>
                                                </div>
                                            </div> 
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="con_hijos" value="checked" type="checkbox"> Con Hijos
                                                    </label>
                                                </div>
                                            </div>                                            
                                    </div>
                                    <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('fecha_ing') ? ' has-error' : '' }}">
                                                        <label  for="fecha_ing">Fecha de Ingreso</label>
                                                        <input type="date" class="form-control" id="fecha_ing" name="fecha_ing" value="{{ old('fecha_ing') }}">
                                                        @if ($errors->has('fecha_ing'))
                                                        <span id="helpBlock8" class="help-block text-danger">
                                                            {{ $errors->first('fecha_ing') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group {{ $errors->has('estado_civil') ? ' has-error' : '' }}">
                                                    <label for="estado_civil" class="control-label">Estado Civil</label>
                                                    <select name="estado_civil" id="estado_civil" class="form-control">
                                                        <option value="soltero" {{ old('estado_civil') == 'soltero' ? ' selected' : '' }}>Soltero</option>
                                                        <option value="casado" {{ old('estado_civil') == 'casado' ? ' selected' : '' }}>Casado</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group {{ $errors->has('especialidad') ? ' has-error' : '' }}">
                                                    <label for="especialidad">Especialidad, Habilidad u Oficio</label>
                                                    <input type="text" class="form-control" name="especialidad" id="especialidad" value="{{ old('especialidad') }}" />
                                                    @if ($errors->has('especialidad'))
                                                    <span id="helpBlock8" class="help-block text-danger">
                                                        {{ $errors->first('especialidad') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group {{ $errors->has('cursos_m') ? ' has-error' : '' }}">
                                                        <label for="cursos_m">Cursos que te gustaría tomar</label>
                                                        <textarea class="form-control" name="cursos_m" id="cursos_m" rows="2" value="{{ old('cursos_m') }}"></textarea>
                                                        @if ($errors->has('cursos_m'))
                                                        <span id="helpBlock8" class="help-block text-danger">
                                                            {{ $errors->first('cursos_m') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group {{ $errors->has('estudios') ? ' has-error' : '' }}">
                                                <label for="estudios" class="control-label">Estudios</label>
                                                <select name="estudios" id="estudios" class="form-control">
                                                    <option value="primaria" {{ old('estudios') == 'primaria' ? ' selected' : '' }}>Primaria</option>
                                                    <option value="securndaria" {{ old('estudios') == 'secundaria' ? ' selected' : '' }}>Secundaria</option>
                                                    <option value="preparatoria" {{ old('estudios') == 'preparatoria' ? ' selected' : '' }}>Preparatoria</option>
                                                    <option value="universidad" {{ old('estudios') == 'universidad' ? ' selected' : '' }}>Universidad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group {{ $errors->has('puesto') ? ' has-error' : '' }}">
                                                <label for="puesto" class="control-label">Puesto actual</label>
                                                <input type="text" id="puesto" name="puesto" class="form-control" value="{{ old('puesto') }}">
                                                @if ($errors->has('puesto'))
                                                <span id="helpBlock8" class="help-block text-danger">
                                                    {{ $errors->first('puesto') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group {{ $errors->has('tiempo') ? ' has-error' : '' }}">
                                                <label for="tiempo" class="control-label">Tiempo en el puesto</label>
                                                <input type="text" id="tiempo" name="tiempo" class="form-control" value="{{ old('tiempo') }}">
                                                @if ($errors->has('tiempo'))
                                                <span id="helpBlock8" class="help-block text-danger">
                                                    {{ $errors->first('tiempo') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('delegado') ? ' has-error' : '' }}">
                                                    <label for="delegado" class="control-label">Delegado</label>
                                                    <input type="text" id="delegado" name="delegado" class="form-control" value="{{ old('delegado') }}">
                                                    @if ($errors->has('delegado'))
                                                    <span id="helpBlock8" class="help-block text-danger">
                                                        {{ $errors->first('delegado') }}
                                                    </span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('puestos_a') ? ' has-error' : '' }}">
                                                    <label for="puestos_a" class="control-label">Puestos anteriores</label>
                                                    <input type="text" id="puestos_a" name="puestos_a" class="form-control" value="{{ old('puestos_a') }}">
                                                    @if ($errors->has('puestos_a'))
                                                    <span id="helpBlock8" class="help-block text-danger">
                                                        {{ $errors->first('puestos_a') }}
                                                    </span>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                        </div>
                            
                            
                            
                          </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="btn_save_temp" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      @if ($errors->any())
      <script>         
            $('#nvo_temp').modal('show');
      </script>
      @endif
      

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