@extends('layouts.nav')

@section('contenido')
<div class="container py-4">
    <div class="card mx-auto font-monospace" style="max-width: 500px;">
        <div class="card-header fs-5 text-center text-primary">
            Nueva Venta
        </div>
        <div class="card-body text-justify">
            <form action="{{ route('guardarVenta') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha de la Venta</label>
                    <input 
                        type="date" 
                        id="fecha" 
                        name="fecha" 
                        class="form-control" 
                        value="{{ old('fecha') }}"
                    >
                    <small class="text-danger fst-italic">{{ $errors->first('fecha') }}</small>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select name="categoria" id="categoria" class="form-select">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger fst-italic">{{ $errors->first('categoria') }}</small>
                </div>

                <div class="mb-3">
                    <label for="producto" class="form-label">Producto</label>
                    <select name="producto" id="producto" class="form-select">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger fst-italic">{{ $errors->first('producto') }}</small>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input 
                        type="number" 
                        id="cantidad" 
                        name="cantidad" 
                        class="form-control" 
                        placeholder="Ingrese la cantidad"
                        value="{{ old('cantidad') }}"
                    >
                    <small class="text-danger fst-italic">{{ $errors->first('cantidad') }}</small>
                </div>

                <div class="mb-3">
                    <label for="monto_total" class="form-label">Monto Total</label>
                    <input 
                        type="number" 
                        id="monto_total" 
                        name="monto_total" 
                        class="form-control" 
                        placeholder="Ingrese el monto total"
                        value="{{ old('monto_total') }}"
                    >
                    <small class="text-danger fst-italic">{{ $errors->first('monto_total') }}</small>
                </div>

                <div class="card-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ route('rutaVentas') }}'">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('¿Está seguro de que desea registrar esta venta?');">
                        Guardar Venta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
  
@endsection