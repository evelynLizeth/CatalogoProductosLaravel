@extends('layouts.crud')

@section('content')
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('catalogo') }}" class="btn btn-primary">Ver catálogo</a>
        <h1 class="fw-bold text-center flex-grow-1">Crud de productos</h1>
        <div style="width:100px"></div> <!-- espacio para centrar el título -->
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div id="alert-success" class="alert alert-success d-flex justify-content-between align-items-center">
            <span>{{ session('success') }}</span>
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-success');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 2000); // 2 segundos
        </script>
    @endif
    <!-- Formulario en tarjeta -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">{{ isset($producto) ? 'Editar producto' : 'Agregar nuevo producto' }}</h5>
        </div>
        <div class="card-body">
           <form action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($producto))
                    @method('PUT')
                @endif

                <!-- Primera fila -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="Nombre" value="{{ $producto->Nombre ?? '' }}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="Descripcion" value="{{ $producto->Descripcion ?? '' }}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="Precio" value="{{ $producto->Precio ?? '0.00' }}" class="form-control">
                    </div>
                </div>

                <!-- Segunda fila -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="1" {{ (isset($producto) && $producto->estado == 1) ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ (isset($producto) && $producto->estado == 0) ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Imagen</label>
                        <div class="d-flex align-items-center">
                            <input type="file" name="imagen" class="form-control">

                            @if(isset($producto) && $producto->imagen)
                                <span class="ms-2 text-success">
                                    Archivo seleccionado: {{ basename($producto->imagen) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100">
                    {{ isset($producto) ? 'Actualizar' : 'Guardar' }}
                </button>
            </form>
        </div>
    </div>

    <!-- Tabla en tarjeta -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Lista de productos</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->Nombre }}</td>
                            <td>{{ $producto->Descripcion }}</td>
                            <td>${{ number_format($producto->Precio, 2, ',', '.') }}</td>
                            <td>{{ $producto->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar el producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection