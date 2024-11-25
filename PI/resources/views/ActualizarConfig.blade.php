@extends('layouts.nav')
@section('contenido')


<div class="container mt-5 col-md-8">

    
    <div class="card font-monospace">
        <div class="card-header fs-5 text-center text-primary">{{ __('Actualizar información de la empresa') }}</div>

        <div class="card-body text-justify">
        @foreach ($empresa as $empresa)
            <form action="{{ route('rutaActualizarEmpresa', [$empresa->id]) }}" method="POST" onsubmit="return confirmarActualizacion()">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">{{ __('Nombre de la empresa') }}</label>
                    <input type="text" class="form-control" name="txtnombre" value="{{ $empresa->nombreEmpresa }}">
                    <small class="text-danger fst-italic">{{ $errors->first('txtnombre') }}</small>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">{{ __('Teléfono de la empresa') }}</label>
                    <input type="text" class="form-control" name="txttelefono" value="{{ $empresa->telefonoEmpresa }}">
                    <small class="text-danger fst-italic">{{ $errors->first('txttelefono') }}</small>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">{{ __('Dirección de la empresa') }}</label>
                    <input type="text" class="form-control" name="txtdireccion" value="{{ $empresa->direccionEmpresa }}">
                    <small class="text-danger fst-italic">{{ $errors->first('txtdireccion') }}</small>
                </div>

                <div class="card-footer text-muted">
                    <div class="d-grid gap-2 mt-2 mb-1">
                        <button type="submit" class="btn btn-warning btn-sm">{{ __('Actualizar') }}</button>
                    </div>
                </div>

            </form>
          </div>
        </div>
    @endforeach

    <script>
        function confirmarActualizacion() {
            return confirm('¿Está seguro de actualizar la información de la empresa?');
        }
    </script>

</div>

@endsection