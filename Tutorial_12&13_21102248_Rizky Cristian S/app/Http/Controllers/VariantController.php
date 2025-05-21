<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variant;

class VariantController extends Controller
{
    public function store(Request $request)
    {
        Variant::create([
            'variant_name' => $request->variant_name,
            'product_id' => $request->product_id
        ]);
        session()->flash('success', 'Varian berhasil ditambahkan!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        session()->flash('success', 'Varian berhasil dihapus!');
        return redirect()->back();
    }
}
