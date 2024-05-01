<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'id_producto';
    protected $fillable = ["codigo","nombre_producto","descripcion","precio","imagen"];
    use HasFactory;
}
