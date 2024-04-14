<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ventas extends Model
{
    use HasFactory;
    protected $fillable = ['id_venta',
    'total_producto',
    'total_venta'];

    protected $primaryKey = 'id_venta';

    public function detalles(): HasMany
    {
        return $this->hasMany(Detalles::class,'id_venta','id_venta');
    }
}
