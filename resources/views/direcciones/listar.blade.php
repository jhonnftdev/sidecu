@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Listado de Direcciones</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            Direcciones Registradas
        </div>

        <div class="card-body">

            {{-- FORMULARIO --}}
            <form id="formBusqueda" method="GET" action="{{ route('direcciones.listar') }}" class="mb-4">
                <div class="row">

                    <div class="col-md-3">
                        <label>Cantón</label>
                        <select name="canton" id="canton" class="form-control">
                            <option value="">Todos los Cantones</option>
                            <option value="SAN MIGUEL DE URCUQUI" {{ request('canton')=='SAN MIGUEL DE URCUQUI'?'selected':'' }}>SAN MIGUEL DE URCUQUI</option>
                            <option value="PIMAMPIRO" {{ request('canton')=='PIMAMPIRO'?'selected':'' }}>PIMAMPIRO</option>
                            <option value="IBARRA" {{ request('canton')=='IBARRA'?'selected':'' }}>IBARRA</option>
                            <option value="ANTONIO ANTE" {{ request('canton')=='ANTONIO ANTE'?'selected':'' }}>ANTONIO ANTE</option>
                            <option value="COTACACHI" {{ request('canton')=='COTACACHI'?'selected':'' }}>COTACACHI</option>
                            <option value="OTAVALO" {{ request('canton')=='OTAVALO'?'selected':'' }}>OTAVALO</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Buscar</label>
                        <input 
                            type="text" 
                            name="buscar" 
                            id="buscar"
                            class="form-control" 
                            placeholder="Calle, referencia o palabra clave"
                            value="{{ request('buscar') }}"
                        >
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <a href="{{ route('direcciones.listar') }}" class="btn btn-secondary w-100">
                            Limpiar
                        </a>
                    </div>

                </div>
            </form>

            {{-- FUNCIÓN RESALTAR --}}
            @php
            function resaltarTexto($texto){
                $buscar = request('buscar');
                if(!$buscar){
                    return $texto;
                }
                return preg_replace(
                    "/(" . preg_quote($buscar, '/') . ")/i",
                    '<mark>$1</mark>',
                    $texto
                );
            }
            @endphp

            {{-- CONTADOR --}}
            <div class="mb-3">
                Mostrando {{ $direcciones->firstItem() }} - {{ $direcciones->lastItem() }} 
                de {{ $direcciones->total() }} direcciones
            </div>

            {{-- TABLA --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cantón</th>
                        <th>Dirección</th>
                        <th>Referencia</th>
                        <th>Observación</th>
                        <th width="150">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($direcciones as $direccion)
                    <tr>
                        <td>{!! resaltarTexto($direccion->canton) !!}</td>
                        <td>
                            {!! resaltarTexto($direccion->calle_principal) !!}
                            @if($direccion->calle_secundaria)
                                - {!! resaltarTexto($direccion->calle_secundaria) !!}
                            @endif
                        </td>
                        <td>{!! resaltarTexto($direccion->referencia) !!}</td>
                        <td>{!! resaltarTexto($direccion->observacion) !!}</td>
                        <td>
                            <a href="{{ route('direcciones.edit',$direccion->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('direcciones.destroy',$direccion->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta dirección?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- PAGINACIÓN --}}
            <div class="mt-3">
                {{ $direcciones->withQueryString()->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

{{-- SCRIPT PARA BÚSQUEDA AUTOMÁTICA --}}
<script>
document.addEventListener("DOMContentLoaded", function () {

    let input = document.getElementById("buscar");
    let canton = document.getElementById("canton");
    let form = document.getElementById("formBusqueda");

    let timeout = null;
    

    // Buscar al escribir (con retraso)
    input.addEventListener("keyup", function () {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            form.submit();
        }, 500);
    });

    // Buscar al cambiar cantón
    canton.addEventListener("change", function () {
        form.submit();
    });

    // Mantener foco input
    input.focus();

    //Mantener cursor al final
    let val = input.value;
    input.value = "";
    input.value = val;

});
</script>

@endsection