<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'historicos';
    protected $fillable = ['id_producto', 'numero_factura','entrada_fisica', 'salida_fisica', 'saldo_fisico', 'entrada_valorada', 'salida_valorada', 'saldo_valorado', 'fecha_movimiento', 'detalle'];
    //public function producto()
    //{
    //    return $this->belongsTo(Producto::class, 'id_producto');
    //}
}
