<?php

namespace App\Http\Controllers;

use App\Models\sale;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{

/*     public static function filterProduct(){
        $filtro = sale::where('id_history', '=', Auth::user()->id)->get();
        return $filtro;
    } */

    public static function filterProduct()
    {

        $filter = DB::table('sales')
        ->leftJoin('products', 'sales.id_product_name', '=', 'products.id')
        ->leftJoin('users', 'sales.id_history', '=', 'users.id')
        ->select('sales.*', 'products.*', 'users.id')
        ->where('users.id', '=', Auth::user()->id)
            ->where('sales.status', '=', 'proceso')
        ->get();
        return $filter;
    }

    public static function filterProductBuy()
    {

        $filter = DB::table('sales')
            ->leftJoin('products', 'sales.id_product_name', '=', 'products.id')
            ->leftJoin('users', 'sales.id_history', '=', 'users.id')
            ->select('sales.*', 'products.*', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('sales.status', '=', 'buy')
            ->get();
        return $filter;
    }

    public function create()
    {
        $carritos = CarritoController::getCarProducts();
        foreach ($carritos as $carrito) {
            Sale::create([
                'id_product_name' => $carrito->id_product_name,
                'amount' => $carrito->amount,
                'id_history'=> Auth::user()->id,
                'price' => $carrito->price,
                'size' => $carrito->size,
                'status'=> 'proceso',
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
        DB::table('products')->decrement('stock', $carrito->amount);
        DB::table('carritos')->delete();

    }



    public function store(Request $request)
    {
        //
    }


    public function show(sale $sale)
    {
        //
    }


    public function edit(sale $sale)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
        sale::where('id_sale',$id)
            ->update([
                'status' =>$request->status,
            ]);
    }

    public function destroy($id)
    {
        $sale = sale::where('id_sale',$id);
        $sale->delete();
    }
}
