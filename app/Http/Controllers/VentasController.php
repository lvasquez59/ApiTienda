<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentasRequest;
use App\Models\Detalles;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class VentasController extends Controller
{
    
    // public function index(Request $request){
    //     $query = Producto::whereRaw('lower(producto) like lower(\'%' . $request->producto . '%\')');
    //     if ($request->has('marca')) $query->whereRaw('lower(marca) like lower(\'%' . $request->marca . '%\')');
        
    //     return $query->paginate(10);
    // }

    public function show(Ventas $venta){
        $venta->detalles;
        return $venta;
    }

    public function store(VentasRequest $request){
         $venta = Ventas::create([
            'total_producto'=>$request->total_producto,
            'total_venta'=>$request->total_venta
         ]);
         foreach($request->productos as $producto){
            Detalles::create([
                'id_venta'=>$venta->id_venta,
                'id_producto'=>$producto['id_producto'],
                'cantidad'=>$producto['unidad'],
                'total'=>$producto['unidad']*$producto['costo']
            ]);
         }
        $venta->detalles;
        return $venta;

    }

}
