<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //$products = Product::paginate(1);

        //return view('products.index', compact('products'));

        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    public function setProduct(Product $product)
    {
        $product->name = "Sample Product 3";
        $product->price = 12.50;
        $product->description = "Sample product created";

        $product->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        //$validated = $request->validated();

        // Retrieve a portion of the validated input...
        // $validated = $request->safe()->only(['name', 'email']);
        // $validated = $request->safe()->except(['name', 'email']);

        Product::create($request->validated());

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show($productId)
    {
        $product = Product::find($productId);
        //response()->json($user);
        //dd(response()->json($user));
        //dd($product->toArray());
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->validated());

        // For a route with the following URI: profile/{id}
        //return redirect()->route('profile', ['id' => 1]);
        //return to_route('profile', ['id' => 1]);
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}