<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarInventario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'lugares_inventarios';
    protected $fillable = ['nombre', 'id_inventario'];
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }
}
