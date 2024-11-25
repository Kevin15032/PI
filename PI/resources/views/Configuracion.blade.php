@extends('layouts.nav')

@section('contenido')

@session('Exito')
<script>
    Swal.fire({
        title: "Respuesta del Servidor!",
        text: "{{ $value}}",
        icon: "success"
    });
</script>
@endsession


<div class="container mt-5 col-md-8">
@foreach ($empresa as $empresa)
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center border-0">
            <h5 class="fs-4 text-primary mb-0">{{ $empresa->nombreEmpresa }}</h5>
        </div>

        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <i class="bi bi-telephone-fill me-2 text-muted"></i>
                <h5 class="fw-normal mb-0">{{ $empresa->telefonoEmpresa }}</h5>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="bi bi-house-door-fill me-2 text-muted"></i>
                <h5 class="fw-normal mb-0">{{ $empresa->direccionEmpresa }}</h5>
            </div>
        </div>

        <div class="card-footer bg-white border-0 text-center">
             <a href="{{ route('rutaEditarEmpresa', [$empresa->id]) }}" class="btn btn-warning btn-sm w-50 py-2">Actualizar</a>

        </div>
    </div>
    @endforeach

<script>
    function confirmarEliminacion() {
        return confirm('¿Está seguro de eliminar la empresa?');
    }
</script>
</div>

@endsection

