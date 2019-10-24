@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Crear una solicitud</h1>
@stop

@section('content')
    <div class="col-md-12">
        @include('partials.message')
        <div class="box box-info">
            <form action="{{route('request.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="concept" class="form-control">
                                <option value="">Seleccióna un concepto</option>
                                <option value="Gastos en general">Gastos en general</option>
                                <option value="Gastos de oficina">Gastos de oficina</option>
                                <option value="Gastos de computo">Gastos de computo</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="description" 
                                placeholder="Descripción" 
                                required 
                                maxlength="60" 
                                minlength="10"
                            >
                        </div>

                        <div class="col-md-4">
                            <input 
                            type="number" 
                            name="amount" 
                            class="form-control" 
                            required
                            placeholder="Cantidad"
                            >
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button class="col-md-offset-5 btn btn-primary" type="submit">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop