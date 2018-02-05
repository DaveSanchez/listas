@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px 0px 0px 30px;">
            <a href="{{ route('listas') }}" class="btn btn-info">Todas las listas</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding:20px 0px 20px 0px;">
        <form method="POST" action="{{ route('listas.update') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="lid" value="{{ $lista['id'] }}">
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                                        <label class="control-label" for="titulo">Título</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                        <input aria-describedby="helpBlock1" type="text" class="form-control" id="titulo" name="titulo" value="{{ $lista['titulo'] }}">
                                        @if ($errors->has('titulo'))
                                        <span id="helpBlock1" class="help-block text-danger">
                                            {{ $errors->first('titulo') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group  {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                        <label class="control-label" for="fecha">Fecha</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                        <input aria-describedby="helpBlock2" type="date" class="form-control" id="fecha" name="fecha" value="{{ $lista['fecha'] }}">
                                        @if ($errors->has('fecha'))
                                        <span id="helpBlock2" class="help-block text-danger">
                                            {{ $errors->first('fecha') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                <div class="row-fluid">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group  {{ $errors->has('observaciones') ? ' has-error' : '' }}">
                                                <label class="control-label" for="observaciones">Observaciones</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                                <textarea aria-describedby="helpBlock3" class="form-control" name="observaciones" id="observaciones" rows="2">{{ $lista['observaciones'] }}</textarea>
                                                @if ($errors->has('observaciones'))
                                                <span id="helpBlock3" class="help-block text-danger">
                                                    {{ $errors->first('observaciones') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row-fluid">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">Actualizar</button>
                                       
                                    </div>
                                </div>
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