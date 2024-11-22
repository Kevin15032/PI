@extends('layouts.nav')

@section('contenido')
@if (session('exito'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "Respuesta servidor!",
            text: "{{ session('exito') }}",
            icon: "success"
        });
    </script>
@endif

<style>
    .card-content {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
    }

    .icon {
        font-size: 2rem;
    }
</style>

<div class="container py-5">
    <h1 class="text-2xl fw-semibold mb-4">Dashboard</h1>

    <div class="row g-4">
        
        

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-content">
                    <i class="lucide-truck icon"></i>
                    <div>
                        <p class="text-sm opacity-90 mb-0">Proveedores</p>
                        <p class="fs-2 fw-bold mb-0">10</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-content">
                    <i class="lucide-package icon"></i>
                    <div>
                        <p class="text-sm opacity-90 mb-0">Productos</p>
                        <p class="fs-2 fw-bold mb-0">185</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-content">
                    <i class="lucide-file-text icon"></i>
                    <div>
                        <p class="text-sm opacity-90 mb-0">Ventas</p>
                        <p class="fs-2 fw-bold mb-0">--</p>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-content">
                    <i class="lucide-archive icon"></i>
                    <div>
                        <p class="text-sm opacity-90 mb-0">Existencia total</p>
                        <p class="fs-2 fw-bold mb-0">148</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-content">
                    <i class="lucide-dollar-sign icon"></i>
                    <div>
                        <p class="text-sm opacity-90 mb-0">Importe vendido</p>
                        <p class="fs-2 fw-bold mb-0">$413</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-content">
                    <i class="lucide-wallet icon"></i>
                    <div>
                        <p class="text-sm opacity-90 mb-0">Beneficio neto</p>
                        <p class="fs-2 fw-bold mb-0">$89</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

