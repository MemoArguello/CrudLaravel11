<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return view("producto.index", compact("productos"));
    }

    ///metodo para crear producto
    public function create()
    {
        return view("producto.create");
    }

    /**
     * Metodo para registrar productos
     */
    public function store(Request $datos)
    {
        
        //validar
        $datos->validate([
            "codigo" => "required",
            "nombre_producto" => "required|unique:productos",
            "precio" => "required",
        ],
        [
            "codigo.required" => "Ingrese el codigo del producto",
            "nombre_producto.required" => "Ingrese nombre de producto",
            "precio.required" => "Ingrese el precio del producto",
            "nombre_producto.unique" => "Ya existe ese producto"
        ]);

        $producto = Producto::create($datos->all());
        //verificar si existe la imagen
        if($datos->hasFile("imagen"))
        {
            //subir la imagen
            $imagenUpload = $datos->file("imagen")->store("productos");

            $imagenUpload = explode("/",$imagenUpload)[1];

            $producto->imagen = $imagenUpload;
            $producto->save();
        }    
        // Redirigir a la vista de productos con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Producto creado correctamente.');
    }

    //editar producto
    public function editar(mixed $producto)
    {
        $producto = Producto::find($producto);

        return view("producto.create",compact("producto"));
    }

    //metodo para actualizar
    public function update(mixed $ProductoModificar, Request $datos)
    {
        $ProductoModificar = Producto::find($ProductoModificar);

           //validar
           $datos->validate([
            "codigo" => "required",
            "nombre_producto" => "required",
            "precio" => "required",
        ],
        [
            "codigo.required" => "Ingrese el codigo del producto",
            "nombre_producto.required" => "Ingrese nombre de producto",
            "precio.required" => "Ingrese el precio del producto",
        ]);

        if($datos->hasFile("imagen"))
        {
            if($ProductoModificar->imagen != null){
                $path_storage = storage_path("app/producto/".$ProductoModificar->imagen);
                unlink($path_storage);
            }
            //subir la imagen
            $imagenUpload = $datos->file("imagen")->store("productos");

            $imagenUpload = explode("/",$imagenUpload)[1];

            $ProductoModificar->imagen = $imagenUpload;

            $ProductoModificar->save();
        }
        $respuesta = $ProductoModificar->update($datos->input());

        if($respuesta)
        {
            return redirect()->route("producto.index")->with("success","Producto Modificado");
        }
        return back()->with("error","Error al modificar");
    }
}
