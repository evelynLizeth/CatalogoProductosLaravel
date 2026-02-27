@extends('layouts.app')

@section('content')
<h1>Catálogo de productos</h1>
<a href="{{ route('productos.create') }}" class="btn btn-primary">Configuración de productos</a>

@if(session('success'))
    <div class="alert alert-success" id="alert">
        {{ session('success') }}
    </div>
@endif

<script>
    setTimeout(() => {
        document.getElementById('alert')?.remove();
    }, 2000);
</script>

<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    @foreach($productos as $producto)
    <tr>
        <td>{{ $producto->Nombre }}</td>
        <td>${{ $producto->Precio }}</td>
        <td>
            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection