@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px 0px 20px 0px;">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nva_lista">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Nueva
            </button>
        </div>
    </div>
</div>
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
                        <th class="text-center">Modificar</th> 
                    </tr> 
                </thead> 
                <tbody> 
                        <?php $i = 1 ?>
                        @foreach ($listas as $lista)
                    <tr class="text-center"> 
                            <th scope="row"><?=$i++?></th>
                            
                        <td>{{ $lista->titulo }}</td> 
                        <td>{{ $lista->fecha }}</td> 
                        <td>{{ $lista->observaciones }}</td>
                        <td>
                            <a href="{!! route('listas.admin',['id' => $lista->id]) !!}">
                                <i class="fa fa-cogs" aria-hidden="true"></i>                                 
                            </a>
                        </td> 
                        <td>
                            <a href="{!! route('listas.show',['id' => $lista->id]) !!}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>                                 
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
<div class="modal fade" id="nva_lista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Nueva Lista</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" id="frm_save_list" action="{{ route('listas.store') }}">
                        {{csrf_field()}}
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                                        <label class="control-label" for="titulo">Título</label><span class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
                                        <input aria-describedby="helpBlock1" type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
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
                                        <input aria-describedby="helpBlock2" type="date" class="form-control" id="fecha" name="fecha">
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
                                                <textarea aria-describedby="helpBlock3" class="form-control" name="observaciones" id="observaciones" rows="2"></textarea>
                                                @if ($errors->has('observaciones'))
                                                <span id="helpBlock3" class="help-block text-danger">
                                                    {{ $errors->first('observaciones') }}
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
              <button type="button" id="btn_save_list" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();">Guardar</button>
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
        @if ($errors->any())
        <script>
            $("#nva_lista").modal('show');
        </script>
        @endif
    
@endsection