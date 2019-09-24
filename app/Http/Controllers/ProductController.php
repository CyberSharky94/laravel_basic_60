<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // == Without DataTables ==
        $limit_per_page = 5;
        $products = Product::latest()->paginate($limit_per_page);
        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * $limit_per_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
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
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        //     'price' => 'required|numeric',
        // ]);

        // After Validation
        $validator = Validator::make(
            $request->all(), 
            [
                // Rules
                'name' => 'required',
                'detail' => 'required',
                // 'price' => 'required|numeric',
            ],
            [
                // // Custom Messages
                // 'name.required' => 'Ruangan Nama perlu diisi',
                // 'detail.required' => 'Ruangan Butiran perlu diisi',
                // 'price.required' => 'Ruangan Harga perlu diisi',
            ],
        );

        if ($validator->fails()) {

            return redirect('products/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index')->with('danger', 'Product has been deleted successfully');
    }
}
