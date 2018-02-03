@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>-->
        <div class="col-md-8 col-md-offset-2">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img width="100%" class="img-responsive" src="{{ asset('img/slide/00001.jpeg') }}" alt="...">
                    
                  </div>
                  <div class="item">
                    <img width="100%" class="img-responsive" src="{{ asset('img/slide/00002.jpeg') }}" alt="...">
                    
                  </div>
                  <div class="item">
                    <img width="100%" class="img-responsive" src="{{ asset('img/slide/00003.jpeg') }}" alt="...">
                    
                  </div>
                </div>

                  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <i class="glyphicon" aria-hidden="true">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon" aria-hidden="true">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
    </div>
</div>
@endsection
