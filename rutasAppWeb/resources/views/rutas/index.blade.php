@extends('layouts.app')

@section('content')
    <h1>Lista de Conductores</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routes as $route)
                <tr>
                    <td>{{ $route->name }}</td>
                    <td>{{ $route->email }}</td>
                    <td>
                        <a href="{{ route('routes.show', $route->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
