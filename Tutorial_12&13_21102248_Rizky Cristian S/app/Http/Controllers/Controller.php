<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

abstract class Controller
{
    public function store(Request $request)
    {
        Product::create(['name' => $request->name]);
        session()->flash('success', 'Produk berhasil ditambahkan!');
        return redirect()->back();
    }
}
