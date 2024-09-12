@extends('layouts.app')

@section('title', 'Datos Conductores')

@section('content')

            <h2>Datos de Conductores</h2>            
            <table id="conductores-table" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Rutas realizadas</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                        <tr>
                            <td>{{ $driver->id }}</td>
                            <td>{{ $driver->nombres }}</td>
                            <td>{{ $driver->ap_paterno }}</td>
                            <td>{{ $driver->ap_materno }}</td>
                            <td>{{ $driver->rutas_count }}</td>
                            <td>
                                <a href="#" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Detalles
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6NJxMsGQckYOVfhJXufWTxKt0oHXC1Zg&callback=initMap"></script>-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#conductores-table').DataTable();
        });
    </script>
    @endsection
