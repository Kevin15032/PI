@extends('layouts.nav')

@section('contenido')
<div class="container py-4">
    <div class="card mx-auto font-monospace" style="max-width: 500px;">
        <div class="card-header fs-5 text-center text-primary">
            Editar Producto
        </div>
        <div class="card-body text-justify">
            <form action="{{ route('actualizarProducto', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select name="categoria_id" id="categoria" class="form-select">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" 
                                {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-danger fst-italic">{{ $errors->first('categoria_id') }}</small>
                </div>

                
                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                    <input 
                        type="text" 
                        id="nombreProducto" 
                        class="form-control" 
                        name="nombre" 
                        value="{{ old('nombre', $producto->nombre) }}" 
                        placeholder="Ingrese el nuevo nombre del producto"
                    >
                    <small class="text-danger fst-italic">{{ $errors->first('nombre') }}</small>
                </div>

                
                <div class="mb-3">
                    <label for="detallesProducto" class="form-label">Detalles</label>
                    <textarea 
                        id="detallesProducto" 
                        class="form-control" 
                        name="detalles" 
                        rows="3" 
                        placeholder="Ingrese los nuevos detalles del producto"
                    >{{ old('detalles', $producto->detalles) }}</textarea>
                    <small class="text-danger fst-italic">{{ $errors->first('detalles') }}</small>
                </div>

                
                <div class="card-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ route('rutaProductos') }}'">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('¿Está seguro de que desea actualizar este producto?');">
                        Actualizar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection