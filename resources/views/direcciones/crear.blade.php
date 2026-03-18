@extends('layouts.app')

@section('content')

<div class="container-fluid">

<h2 class="mb-4">Crear Dirección</h2>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<div class="card">

<div class="card-header">
Nuevo Registro
</div>

<div class="card-body">

<form method="POST" action="{{ route('direcciones.store') }}">
@csrf

<div class="row">

<div class="col-md-3 mb-3">
<label>Cantón</label>

<select name="canton" class="form-control" required>

<option value="">Seleccione Cantón</option>
<option value="SAN MIGUEL DE URCUQUI">SAN MIGUEL DE URCUQUI</option>
<option value="PIMAMPIRO">PIMAMPIRO</option>
<option value="IBARRA">IBARRA</option>
<option value="ANTONIO ANTE">ANTONIO ANTE</option>
<option value="COTACACHI">COTACACHI</option>
<option value="OTAVALO">OTAVALO</option>

</select>

</div>

<div class="col-md-3 mb-3">
<label>Calle Principal</label>
<input type="text" name="calle_principal" class="form-control mayus" required>
</div>

<div class="col-md-3 mb-3">
<label>Calle Secundaria</label>
<input type="text" name="calle_secundaria" class="form-control mayus" required>
</div>

<div class="col-md-3 mb-3">
<label>Referencia</label>
<input type="text" name="referencia" class="form-control mayus" required>
</div>

<div class="col-md-12 mb-3">
<label>Observación</label>
<input type="text" name="observacion" class="form-control mayus">
</div>

</div>

<button class="btn btn-primary">
Guardar
</button>

</form>

</div>
</div>

</div>
