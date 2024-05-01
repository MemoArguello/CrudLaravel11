@extends('layout')

@section('title','Productos')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="float-start">Productos Registrados</h5>
                    <a href="{{ route('producto.create')}}" class="btn btn-info float-end">Agregar Producto</a>
                </div>
                <div class="card-body">
                    @if ($mensaje = Session::get("success"))
                    <div class="alert alert-success">
                        {{$mensaje}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Imagen</th>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productos as $producto)
                                    @php
                                        $foto = $producto->imagen != null ? "catalogo-de-productos/".$producto->imagen : 'img/notfound.jpg';
                                    @endphp
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$producto->nombre_producto}}</td>
                                    <td>
                                        <img src="{{$foto}}" alt="" style="width:50px; height:50px;">
                                    </td>
                                    <td>{{$producto->codigo}}</td>
                                    <td>
                                        @if (!is_null($producto->descripcion))
                                            {{$producto->descripcion}}
                                            @else
                                                <span class="text-danger">No especifico descripcion</span>
                                        @endif
                                    </td>
                                    <td>{{$producto->precio}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{route('producto.editar',$producto)}}">Editar</a></li>
                                                <li><a class="dropdown-item" href="">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">
                                        <span class="text-danger">No hay productos registrados</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
