<form action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}" 
      method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($producto))
        @method('PUT')
    @endif

    <label>Nombre</label>
    <input type="text" name="Nombre" value="{{ $producto->Nombre ?? '' }}" class="form-control">

    <label>Precio</label>
    <input type="number" step="0.01" name="Precio" value="{{ $producto->Precio ?? '' }}" class="form-control">

    <label>Descripción</label>
    <textarea name="Descripcion" class="form-control">{{ $producto->Descripcion ?? '' }}</textarea>

    <label>Imagen</label>
    <input type="file" name="imagen" class="form-control">

    <button type="submit" class="btn btn-success">
        {{ isset($producto) ? 'Actualizar' : 'Crear' }}
    </button>
</form>