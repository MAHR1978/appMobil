@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Welcome to your dashboard</h1>
        <p class="lead">Welcome, {{ Auth::user()->name }}!</p>

        <section class="icon-container d-flex justify-content-around">
            <!-- Icono para ver conductores -->
            <article class="icon-box text-center">
                <i class="fas fa-car fa-3x mb-3"></i>
                <a href="{{ route('drivers.index') }}" class="btn btn-primary" aria-label="View Drivers">View Drivers</a>
            </article>

            <!-- Icono para ver rutas -->
            <article class="icon-box text-center">
                <i class="fas fa-route fa-3x mb-3"></i>
                <a href="{{ route('routes.index') }}" class="btn btn-primary" aria-label="View Routes">View Routes</a>
            </article>
        </section>
    </div>
@endsection


