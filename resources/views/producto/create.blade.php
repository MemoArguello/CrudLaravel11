@extends('layout')
@section('title',!isset($Producto) ? 'Registar Producto':'Editar Producto')
@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card boder-primary">
                    <div class="card-header bg-primary">
                        <h5 class="text-white float-start">{{!isset($producto) ? 'Crear nuevo producto':'Editar Producto'}}</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error al Registrar!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ol>
                        </div>
                        @endif
                        <form action="{{!isset($producto) ? route("producto.store"):route("producto.update",$producto)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($producto))
                                @method("PUT")
                            @endif
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="codigo">Codigo *</label>
                                        <input type="text" name="codigo" id="codigo" class="form-control" value="{{!isset($producto)?old("codigo"):$producto->codigo}}">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nombre_producto">Nombre Producto *</label>
                                        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="{{!isset($producto)?old("nombre_producto"):$producto->nombre_producto}}">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="Descripcion">Descripcion</label>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{!isset($producto)?old("descripcion"):$producto->descripcion}}">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="Descripcion">Precio *</label>
                                        <input type="text" name="precio" id="precio" class="form-control" value="{{!isset($producto)?old("precio"):$producto->precio}}">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="Descripcion">Seleccione una Imagen *</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-outline-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection