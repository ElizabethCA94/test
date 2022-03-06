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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title text-center">Edición de productos</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                                    value={{ $producto->nombre }}>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Descripcion" value={{ $producto->descripcion }}>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio"
                                    value={{ $producto->precio }}>
                            </div>
                            <div class="form-group">
                                <label for="estado">estado</label>
                                <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado"
                                    value={{ $producto->precio }}>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Editar</button>
                        </form>
                        @if (isset($errors) && $errors->any())
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="alert alert-danger col-md-12 mt-2" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {!! $error !!}
                                    @endforeach
                                </div>
                            </div>
                        @endif
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
    <script>
        < script src = "{{ asset('js/app.js') }}"
        defer >
    </script>

    </script>
@stop
