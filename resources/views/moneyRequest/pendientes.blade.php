@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Solicitudes pendientes</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Concepto</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th class="text-center">Autorizado</th>
                        </tr>
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

                                @if($item->authorized_coordinator === 'autorizado')
                                <td class="text-center">
                                    <i class="fas fa-check text-blue"></i>
                                </td>
                                @elseif($item->authorized_coordinator == 'no-autorizado' )
                                <td class="text-center">
                                    <i class="fas fa-times text-red"></i>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection