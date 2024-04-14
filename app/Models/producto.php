<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'id_producto';
    public $fillable=['codigo','producto','costo','marca','cantidad','id_producto'];

}
