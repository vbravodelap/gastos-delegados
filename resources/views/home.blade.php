@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>{{number_format($user->available_money, 2, ',', ',')}} $</h3>
      
                    <p>Mi presupuesto.</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-check-alt"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@stop
