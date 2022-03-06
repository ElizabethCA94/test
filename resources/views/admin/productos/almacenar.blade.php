@extends('adminlte::page')

@section('title', 'Productos')

@section('plugins.bootstrapSwitch', true)
@section('plugins.bootstrapColorpicker', true)
@section('plugins.bootstrap4DualListbox', true)
@section('plugins.bootstrapSlider', true)
@section('plugins.datatables', true)
@section('plugins.datatablesPlugins', true)

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    <section class="content container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title text-center">Creación de productos</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group pt-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagen" id="imagen" placeholder="Imagen" accept="image/*"
                                        autocomplete="off">
                                    <label for="imagen" class="custom-file-label">Imagen</label>
                                </div>
                                @error('file')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nombre"></label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion"></label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Descripcion" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="precio"></label>
                                <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-check" onchange="validarEstado()">
                                <input class="form-check-input" type="checkbox" value="1" name="estado" id="estado" checked>
                                <label class="form-check-label" for="estado">Publicado</label>
                            </div>
                            <div class="btn-group" role="group" aria-label="crear-producto">
                                <button type="submit" class="btn btn-primary mt-2">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

@stop

@section('js')
<script src = "{{ asset('js/app.js') }}" defer></script>

<script>
function validarEstado() {
    const stateInputElement = document.getElementById('estado')
    const stateLabelElement = document.querySelector('label[for="estado"]')
    const stateValue = stateLabelElement.innerHTML
    stateLabelElement.innerHTML = stateInputElement.checked
        ? 'Publicado'
        : 'Sin Publicar'
}
</script>
@stop
