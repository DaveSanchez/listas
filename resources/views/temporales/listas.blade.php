@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:20px 0px 20px 0px;">
            <a href="{{ route('temporales') }}" class="btn btn-info">Todos los temporales</a>
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
                            <a href="{!! route('listas.admin',['id' => $lista->lista_id]) !!}">
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

@endsection