@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="mb-4">Editar Dirección</h2>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif


<div class="card">
<div class="card-body">

<form action="{{ route('direcciones.update', $direccion->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Cantón</label>

<select name="canton" class="form-control" required>




<option value="SAN MIGUEL DE URCUQUI" {{ $direccion->canton=='SAN MIGUEL DE URCUQUI'?'selected':'' }}>SAN MIGUEL DE URCUQUI</option>
<option value="PIMAMPIRO" {{ $direccion->canton=='PIMAMPIRO'?'selected':'' }}>PIMAMPIRO</option>
<option value="IBARRA" {{ $direccion->canton=='IBARRA'?'selected':'' }}>IBARRA</option>
<option value="ANTONIO ANTE" {{ $direccion->canton=='ANTONIO ANTE'?'selected':'' }}>ANTONIO ANTE</option>
<option value="COTACACHI" {{ $direccion->canton=='COTACACHI'?'selected':'' }}>COTACACHI</option>
<option value="OTAVALO" {{ $direccion->canton=='OTAVALO'?'selected':'' }}>OTAVALO</option>

</select>

</div>


<div class="mb-3">
<label class="form-label">Calle Principal</label>
<input type="text" name="calle_principal" class="form-control mayus"
value="{{ $direccion->calle_principal }}" required>
</div>


<div class="mb-3">
<label class="form-label">Calle Secundaria</label>
<input type="text" name="calle_secundaria" class="form-control mayus"
value="{{ $direccion->calle_secundaria }}" required>
</div>


<div class="mb-3">
<label class="form-label">Referencia</label>
<input type="text" name="referencia" class="form-control mayus"
value="{{ $direccion->referencia }}" required>
</div>


<div class="mb-3">
<label class="form-label">Observación</label>
<input type="text" name="observacion" class="form-control mayus"
value="{{ $direccion->observacion }}">
</div>


<button class="btn btn-primary">
Actualizar Dirección
</button>

<a href="{{ route('direcciones.listar') }}" class="btn btn-secondary">
Volver
</a>

</form>

</div>
</div>

</div>

<script>

// convertir texto a MAYÚSCULAS automáticamente
document.querySelectorAll('.mayus').forEach(function(input){

input.addEventListener('input', function(){

this.value = this.value.toUpperCase();

});

});

</script>

@endsection