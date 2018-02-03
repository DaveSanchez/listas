@extends('layouts.app')

@section('content')



<form id="frm_baja_temp" action="{{ route('temporales.disable') }}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="idtemp" value="{{ $temporal['id'] }}">
</form>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <form method="POST" id="frm_update_temp" action="{{ route('temporales.update') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="idtemp" value="{{ $temporal['id'] }}">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group {{ $errors->has('rtt') ? ' has-error' : '' }}">
                                <label class="control-label" for="rtt">RTT</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock1" type="text" class="clave_Temp form-control" id="rtt" name="rtt" value="{{ $temporal['rtt'] }}">
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
                                <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock2" type="text" class="form-control" id="nombre" name="nombre" value="{{ $temporal['nombre_s'] }}">
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
                                <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock3" type="text" class="form-control" id="ap" name="ap" value="{{ $temporal['apellido_paterno'] }}">
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
                                    <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock4" type="text" class="form-control" id="am" name="am" value="{{ $temporal['apellido_materno'] }}">
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
                                        <input {{ $temporal['alta'] ? '' : 'disabled' }} type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ $temporal['fecha_nac'] }}">
                                    </div>
                                </div>
                        </div>
                        <div class="row-fluid">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <textarea {{ $temporal['alta'] ? '' : 'disabled' }} class="form-control" name="direccion" id="direccion" rows="2" value="{{ $temporal['direccion'] }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group {{ $errors->has('tel_personal') ? ' has-error' : '' }}">
                                            <label class="control-label" for="tel_personal">Teléfono personal</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                            <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock5" type="text" class="form-control" id="tel_personal" name="tel_personal" value="{{ $temporal['tel_personal'] }}">
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
                                            <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock6" type="text" class="form-control" id="tel_casa" name="tel_casa" value="{{ $temporal['tel_casa'] }}">
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
                                        <label class="control-label" for="foto">Foto</label>
                                        <input {{ $temporal['alta'] ? '' : 'disabled' }} aria-describedby="helpBlock8" type="file" name="foto" id="foto" class="form-control" value="{{ old('foto') }}">
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
                                                    <label for="deportes">Deportes que practicas</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                    <textarea {{ $temporal['alta'] ? '' : 'disabled' }} class="form-control" name="deportes" id="deportes" rows="2">{{ $temporal['deportes'] }}</textarea>
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
                                            <input {{ $temporal['alta'] ? '' : 'disabled' }} name="cijubila" {{ $temporal['cijubila'] ? 'checked' : '' }}  value="checked" type="checkbox"> cijubila
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="checkbox">
                                            <label>
                                                <input {{ $temporal['alta'] ? '' : 'disabled' }} name="p25" {{ $temporal['p25'] ? 'checked' : '' }} value="checked" type="checkbox"> 25%
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="checkbox">
                                            <label>
                                                <input {{ $temporal['alta'] ? '' : 'disabled' }} name="con_hijos" {{ $temporal['con_hijos'] ? 'checked' : '' }} value="checked" type="checkbox"> Con Hijos
                                            </label>
                                        </div>
                                    </div>                                            
                            </div>
                            <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('fecha_ing') ? ' has-error' : '' }}">
                                                        <label  for="fecha_ing">Fecha de Ingreso</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                        <input {{ $temporal['alta'] ? '' : 'disabled' }} type="date" class="form-control" id="fecha_ing" name="fecha_ing" value="{{ $temporal['fecha_ing'] }}">
                                                        @if ($errors->has('fecha_ing'))
                                                        <span id="helpBlock8" class="help-block text-danger">
                                                            {{ $errors->first('fecha_ing') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group {{ $errors->has('estado_civil') ? ' has-error' : '' }}">
                                                    <label for="estado_civil" class="control-label">Estado Civil</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                    <select {{ $temporal['alta'] ? '' : 'disabled' }} name="estado_civil" id="estado_civil" class="form-control">
                                                        <option value="soltero" {{ $temporal['estado_civil'] == 'soltero' ? ' selected' : '' }}>Soltero</option>
                                                        <option value="casado" {{ $temporal['estado_civil'] == 'casado' ? ' selected' : '' }}>Casado</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-fluid">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group {{ $errors->has('especialidad') ? ' has-error' : '' }}">
                                                    <label for="especialidad">Especialidad, Habilidad u Oficio</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                    <input {{ $temporal['alta'] ? '' : 'disabled' }} type="text" class="form-control" name="especialidad" id="especialidad" value="{{ $temporal['especialidad'] }}" />
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
                                                        <label for="cursos_m">Cursos que te gustaría tomar</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                        <textarea {{ $temporal['alta'] ? '' : 'disabled' }} class="form-control" name="cursos_m" id="cursos_m" rows="2">{{ $temporal['cursos_deseados'] }}</textarea>
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
                                                <label for="estudios" class="control-label">Estudios</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                <select {{ $temporal['alta'] ? '' : 'disabled' }} name="estudios" id="estudios" class="form-control">
                                                    <option value="primaria" {{ $temporal['estudios'] == 'primaria' ? ' selected' : '' }}>Primaria</option>
                                                    <option value="securndaria" {{ $temporal['estudios'] == 'secundaria' ? ' selected' : '' }}>Secundaria</option>
                                                    <option value="preparatoria" {{ $temporal['estudios'] == 'preparatoria' ? ' selected' : '' }}>Preparatoria</option>
                                                    <option value="universidad" {{ $temporal['estudios'] == 'universidad' ? ' selected' : '' }}>Universidad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group {{ $errors->has('puesto') ? ' has-error' : '' }}">
                                                <label for="puesto" class="control-label">Puesto actual</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                <input {{ $temporal['alta'] ? '' : 'disabled' }} type="text" id="puesto" name="puesto" class="form-control" value="{{ $temporal['puesto_actual'] }}">
                                                @if ($errors->has('puesto'))
                                                <span id="helpBlock8" class="help-block text-danger">
                                                    {{ $errors->first('puesto') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group {{ $errors->has('tiempo') ? ' has-error' : '' }}">
                                                <label for="tiempo" class="control-label">Tiempo en el puesto</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                <input {{ $temporal['alta'] ? '' : 'disabled' }} type="text" id="tiempo" name="tiempo" class="form-control" value="{{ $temporal['tiempo_en_puesto'] }}">
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
                                                    <label for="delegado" class="control-label">Delegado</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                    <input {{ $temporal['alta'] ? '' : 'disabled' }} type="text" id="delegado" name="delegado" class="form-control" value="{{ $temporal['delegado'] }}">
                                                    @if ($errors->has('delegado'))
                                                    <span id="helpBlock8" class="help-block text-danger">
                                                        {{ $errors->first('delegado') }}
                                                    </span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group {{ $errors->has('puestos_a') ? ' has-error' : '' }}">
                                                    <label for="puestos_a" class="control-label">Puestos anteriores</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                    <input {{ $temporal['alta'] ? '' : 'disabled' }} type="text" id="puestos_a" name="puestos_a" class="form-control" value="{{ $temporal['puestos_anteriores'] }}">
                                                    @if ($errors->has('puestos_a'))
                                                    <span id="helpBlock8" class="help-block text-danger">
                                                        {{ $errors->first('puestos_a') }}
                                                    </span>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                            @if ($temporal['alta'])
                            <div class="row-fluid">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Actualizar</button>                            
                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <button id="btn_baja_temp" class="btn btn-danger btn-block" type="button">Baja</button>
                                
                                </div>
                                </div>
                            </div>
                                
                            @endif
                </div>
                    
                    
                    
                  </form>
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