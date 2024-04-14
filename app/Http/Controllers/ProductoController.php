<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\ApiController;

class ProductoController extends ApiController{
    public function index(Request $request){
        $query = Producto::whereRaw('lower(producto) like lower(\'%' . $request->producto . '%\')');
        if ($request->has('marca')) $query->whereRaw('lower(marca) like lower(\'%' . $request->marca . '%\')');
        
        return $query->paginate(10);
    }

    public function store(ProductRequest $request){
        
        $request->validate(['codigo' =>  'unique:productos']);
        
        return producto::create([
            "codigo"=> $request->codigo,
            "producto"=> $request->producto,
            "costo"=> $request->costo,
            "cantidad"=> $request->cantidad??null,
            "marca"=> $request->marca??null
        ]);
    }

    public function show(String $producto){
        return producto::where('codigo',$producto)->firstOrFail();
    }

    public function update(Request $request, producto $producto){
        $producto->fill($request->all());
        if ($producto->isClean())
            return $this->errorResponse(
                "Se necesita especificar un valor diferente para actualizar",
                422
            );

        $producto->save();

        return $this->showOne($producto);
    }

    public function destroy(producto $producto){
        $producto->delete();
        return $this->showOne($producto);
    }
}
