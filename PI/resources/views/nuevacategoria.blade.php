@extends('layouts.nav')

@section('contenido')
<div class="container py-4">
    <div class="card mx-auto font-monospace" style="max-width: 500px;">
        <div class="card-header fs-5 text-center text-primary">
            {{ $titulo ?? 'Nueva Categoría' }}
        </div>
        <div class="card-body text-justify">
            <form action="{{ $ruta ?? route('guardarCategoria') }}" method="POST">
                @csrf
                @isset($categoria)
                    @method('PUT')
                @endisset

                <div class="mb-3">
                    <label for="categoryName" class="form-label">{{ __('Nombre de la categoría') }}</label>
                    <input 
                        type="text" 
                        id="categoryName" 
                        class="form-control" 
                        name="txtnombreCategoria" 
                        value="{{ old('txtnombreCategoria', $categoria->nombre ?? '') }}" 
                        placeholder="Ingrese el nombre de la categoría"
                    >
                    <small class="text-danger fst-italic">{{ $errors->first('txtnombreCategoria') }}</small>
                </div>

                <div class="card-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" id="cancelButton" onclick="window.location='{{ route('rutaCategorias') }}'">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-success btn-sm"   onclick="return confirm('¿Está seguro de que desea agregar esta categoría?');">
                        {{ __('Guardar Categoría') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
