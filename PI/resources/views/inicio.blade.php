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

@endsection