@extends('layouts.crud')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('catalogo') }}" class="btn btn-primary">Ver catálogo</a>
        <h1 class="fw-bold text-center flex-grow-1">Crud de productos</h1>
        <div style="width:100px"></div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">{{ isset($producto) ? 'Editar producto' : 'Agregar nuevo producto' }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ isset($producto) ? route('productos.update', $producto) : route('productos.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="imagen" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    {{ isset($producto) ? 'Actualizar' : 'Guardar' }}
                </button>
            </form>
        </div>
    </div>
@endsection