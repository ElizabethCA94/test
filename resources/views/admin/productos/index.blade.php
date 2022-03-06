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
                        <span class="card-title">Lista de productos</span>
                        <div class="float-right">
                            <a href="{{ route('admin.productos.create') }}">
                                <button class="btn btn-success btn-sm my-1 mb-3">
                                    Crear
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th>Publicación</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($producto->imagen)
                                                    <img class="px-1" src="/imagen/{{ $producto->imagen }}"
                                                    width="80%">

                                                @else
                                                    <?php echo 'No hay imagen'?>
                                                @endif
                                                
                                                
                                            </td>
                                            <td><div onclick="onProductClick(this)">{{ $producto->nombre }}</div></td>
                                            <td>{{ $producto->descripcion }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td>
                                                @if ($producto->estado === 1)
                                                    <span class="badge rounded-pill bg-primary">Publicado</span>
                                                @else
                                                    <span class="badge rounded-pill bg-warning text-dark">No
                                                        publicado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($producto->estado === 1)
                                                    <?php
                                                    $date = str_replace('-"', '/', $producto->created_at);
                                                    $formattedDate = date('d/m/Y', strtotime($date));
                                                    $formattedTime = date('h:i A', strtotime($date));
                                                    echo $formattedDate;
                                                    echo '<br>';
                                                    echo $formattedTime;
                                                    ?>
                                                @else
                                                    <?php
                                                    echo 'Sin fecha';
                                                    ?>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-sm-center">
                                                    <div class="btn-group" role="group" aria-label="editar-producto">
                                                        <a href="{{ route('admin.productos.edit', $producto->id) }}">
                                                            <button class="btn btn-primary btn-sm">
                                                                Editar
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="ver-producto">
                                                        <a href="{{ route('admin.productos.show', $producto->id) }}">
                                                            <button class="btn btn-success btn-sm mx-1">
                                                                Mostrar
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="eliminar-producto">
                                                        @can('admin.productos.destroy')
                                                            <form
                                                                action="{{ route('admin.productos.destroy', $producto->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    Eliminar
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <style>
        th,
        td {
            text-align: center;
        }
    </style>

@stop

@section('js')
        <script src = "{{ asset('js/app.js') }}" defer>
        </script>
        <script>
            function onProductClick($event){
                const productName = $event.innerHTML;
                alert(`Confirmacion al dar clic en ${productName}`);
            }
        </script>
@stop
