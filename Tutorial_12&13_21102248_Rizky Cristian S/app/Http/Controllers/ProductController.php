<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProductsWithVariants()
    {
        $products = Product::with('variants')->get();
        return view('product_variants', compact('products'));
    }

    public function create()
    {
        return view('product_form');
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Produk berhasil ditambahkan!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product_edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update(['name' => $request->name]);
        session()->flash('success', 'Produk berhasil diupdate!');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('success', 'Produk berhasil dihapus!');
        return redirect()->route('products.single');
    }    public function index(Request $request)
    {
        $prods = Product::get();

        if (request()->segment(1) == 'api') {
            return response()->json([
                'error' => false,
                'list' => $prods
            ]);
        }

        if ($request->has('edit')) {
            $editProduct = Product::find($request->edit);
            return view('product_singlepage', [
                'products' => $prods,
                'editProduct' => $editProduct
            ]);
        }

        return view('view_product', [
            'title' => 'Daftar Produk',
            'data' => $prods
        ]);
    }

    public function storeOrUpdate(Request $request)
    {
        if ($request->has('id') && $request->id) {
            // Update
            $product = Product::findOrFail($request->id);
            $product->update(['name' => $request->name]);
            session()->flash('success', 'Produk berhasil diupdate!');
        } else {
            // Create
            Product::create(['name' => $request->name]);
            session()->flash('success', 'Produk berhasil ditambahkan!');
        }
        return redirect()->route('products.single');
    }
}
