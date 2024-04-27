<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    use HasFactory;
    protected $fillable = ['id_venta',
    'id_producto',
    'cantidad',
    'total'];
    protected $table ='detventa';
    public $incrementing = false;
    public $timestamps = false;
    
    public function producto(): HasOne
    {
        return $this->hasOne(producto::class,'id_producto','id_producto');
    }
}
