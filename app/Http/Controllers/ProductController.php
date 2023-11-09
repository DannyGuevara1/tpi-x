<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function ShowProducts(){
        $products = product::all();
        return response()->json($products);
        /* return view('products')->with('products', $products); */
    }

    public function ShowProduct($id){
        $products = product::find($id);
        return response()->json($products);
        /* return view('product')->with('producto', $products); */
    }



    public function create()
    {
        return view('createProduct');
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name_product' => ['required', Rule::unique('products', 'name_product')],
            'category' => 'required',
            'supplier' => 'required',
            'stock' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'image_product' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image_product'))
        {
            $formImg = $request->file('image_product')->store('img_product', 'public');
        }else{
            $formImg = 'default.jpg';
        }
        product::create([
            'name_product' => $request->name_product,
            'category' => $request->category,
            'code'=> $request->code,
            'supplier' => $request->supplier,
            'stock' => $request->stock,
            'cost' => $request->cost,
            'price' => $request->price,
            'image_product' => $formImg,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('adminProducts');
    }


    public function edit(product $id)
    {
        return view('admin.editProduct')->with('product',$id);
    }

    public function update(Request $request, $id)
    {


        if($request->hasFile('image_product'))
        {
            $formImg = $request->file('image_product')->store('img_product', 'public');
        }else{
            $formImg = 'default.jpg';
        }
        $product = product::find($id);
        product::where('id',$id)
             ->update([
                'name_product' => $request->name_product ? $request->name_product: $product->name_product,
                'category' => $request->category? $request->category: $product->category,
                'supplier' => $request->supplier ? $request->supplier: $product->supplier,
                'stock' => $request->stock ? $request->stock : $product->stock,
                'cost' => $request->cost ? $request->cost : $product->cost,
                'price' => $request->price ? $request->price: $product->price,
                'image_product' => $formImg ? $formImg: $product->image_product,
                'description' => $request->description ? $request->description : $product->description,
                'updated_at' => now(),
             ]);

        return redirect()->route("adminProducts");
    }
    public static function SelectProduct($id){
        $products = product::find($id);
        return $products;
    }

    public function showCategory($category){
        $casual = product::where('category', $category)->get();
        return response()->json($casual);
    }


    public function showRangePrice($inicio,$final){
//        $rangoPrecio = '50-300'; //reemplazar este valor con lo que venga del formulario
//        $precioSeparado = explode("-", $rangoPrecio);
//        $precioMinimo = $precioSeparado[0];
//        $precioMaximo = $precioSeparado[1];

        $runner = product::whereBetween('price', [$inicio, $final] )->get();
        return response()->json($runner);
    }

    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();

    }
}
