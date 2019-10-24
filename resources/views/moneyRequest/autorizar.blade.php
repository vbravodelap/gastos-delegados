@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Autorizar solicitudes</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Concepto</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Status</th>   
                        <th class="text-center">Acción</th>
                    </thead>

                    <tbody>
                        @foreach ($moneyRequests as $item)
                            <tr>
                                <td>
                                    {{$item->id}}
                                </td>

                                <td>
                                    {{$item->concept}}
                                </td>

                                <td>
                                    {{$item->description}}
                                </td>

                                <td>
                                    {{number_format($item->amount, 2, ',', ',')}} $
                                </td>

                                <td>
                                    {{$item->status}}
                                </td>

                                <td class="text-center">
                                    <a href="" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </a>

                                    <a href="" class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop