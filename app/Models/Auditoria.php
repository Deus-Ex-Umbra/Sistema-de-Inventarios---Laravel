<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'auditorias';
    protected $fillable = ['id_inventario', 'fecha_auditoria', 'cantidad_registrada', 'cantidad_real', 'valor_registrado', 'valor_real', 'observaciones'];
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }
}
