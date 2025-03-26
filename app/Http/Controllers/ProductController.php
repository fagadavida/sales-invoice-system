<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(): View
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {

        if ($request->hasFile('file')) {

            $filename = date('yyMMddhhmmss') . ".jpg";

            $request->file->move(public_path('uploads'), $filename);
            Product::create($request->validated() + ["image_path" => $filename]);

            return redirect()->route('products.index')
                ->with('success', 'Product created successfully.');

        }
        return redirect()->back()
            ->with('success', 'Product Not created.');
    }


    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }
    public function getProduct(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json($product);
    }


    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
