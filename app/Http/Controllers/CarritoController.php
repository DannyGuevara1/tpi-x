<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function showCarProducts()
    {
        $products = DB::table('carritos')
            ->leftJoin('products', 'carritos.id_product_name', '=', 'products.id')
            ->leftJoin('users', 'carritos.id_history', '=', 'users.id')
            ->select('carritos.*', 'products.*', 'users.*')
            ->where('users.id', '=', Auth::user()->id)
            ->get();

//                $respuesta =  json_decode($products, true);
                return response()->json($products);

//        return view('users.cart')->with('carrito', $products);
    }

    public static function getCarProducts()
    {
        $products = DB::table('carritos')
            ->leftJoin('products', 'carritos.id_product_name', '=', 'products.id')
            ->leftJoin('users', 'carritos.id_history', '=', 'users.id')
            ->select('carritos.*', 'products.*', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->get();

        return $products;
    }

    public function addCarrito($id)
    {
        $productOne = ProductController::SelectProduct($id);

        Carrito::create([
            'id_product_name' => $id,
            'amount' => 1,
            'id_history'=> Auth::user()->id,
            'price' => $productOne->value('price'),
            'size' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->withErrors([
            'Message' => 'Producto Agregado con Exito. !'
        ])->withInput();
    }




    public function destroyCarrito()
    {
        DB::table('carritos')->where('id_history',Auth::user()->id)->delete();
        return redirect()->route('index')->withErrors([
            'Message' => 'Productos Eliminado con Exito. !'
        ])->withInput();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Carrito::where('id_cart',$id);
        $cart->delete();
    }
}
