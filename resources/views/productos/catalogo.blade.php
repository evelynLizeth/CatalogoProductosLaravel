@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Catálogo de productos</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('productos.index') }}" class="btn btn-primary">
            Configuración de productos
        </a>

        <form method="GET" action="{{ url('/') }}" class="d-flex">
            <input type="number" name="min" value="{{ $min }}" class="form-control me-2" placeholder="Precio mínimo">
            <input type="number" name="max" value="{{ $max }}" class="form-control me-2" placeholder="Precio máximo">
            <button type="submit" class="btn btn-success">Filtrar</button>
        </form>
    </div>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-3 mb-4">
                <div class="card h-100 text-center bg-white text-dark shadow-sm border-0 rounded-3">
                    <div class="overflow-hidden">
                        <img src="{{ asset($producto->imagen) }}" class="card-img-top zoom" alt="{{ $producto->Nombre }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->Nombre }}</h5>
                        <p class="card-text">${{ number_format($producto->Precio,2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
.zoom {
    transition: transform .3s ease;
}
.zoom:hover {
    transform: scale(1.2);
}
</style>
@endsection