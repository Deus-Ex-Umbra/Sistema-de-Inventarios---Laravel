<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'ruta_imagen', 'categoria_id', 'marca_id', 'proveedor_id', 'inventario_id'];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
}
