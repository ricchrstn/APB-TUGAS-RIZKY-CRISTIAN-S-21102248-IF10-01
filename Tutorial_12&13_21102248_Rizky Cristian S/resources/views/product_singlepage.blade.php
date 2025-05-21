@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm">
                <div class="card-header {{ isset($editProduct) && $editProduct ? 'bg-warning text-dark' : 'bg-success text-white' }}">
                    <h5 class="mb-0">{{ isset($editProduct) && $editProduct ? 'Edit Produk' : 'Tambah Produk' }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.storeOrUpdate') }}">
                        @csrf
                        @if(isset($editProduct) && $editProduct)
                            <input type="hidden" name="id" value="{{ $editProduct->id }}">
                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($editProduct) && $editProduct ? $editProduct->name : '' }}" required autofocus>
                        </div>
                        <button type="submit" class="btn {{ isset($editProduct) && $editProduct ? 'btn-warning' : 'btn-success' }}">
                            {{ isset($editProduct) && $editProduct ? 'Update' : 'Simpan' }}
                        </button>
                        @if(isset($editProduct) && $editProduct)
                            <a href="{{ route('products.single') }}" class="btn btn-secondary">Batal</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 flex-grow-1">Daftar Produk dan Variannya</h4>
            </div>
            @if(count($products) > 0)
                @foreach($products as $product)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <span>{{ $product->name }}</span>
                            <div>
                                <a href="{{ route('products.single', ['edit' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($product->variants) > 0)
                                <ul class="list-group list-group-flush mb-3">
                                    @foreach($product->variants as $variant)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $variant->variant_name }}
                                            <form action="{{ route('variant.destroy', $variant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus varian ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">Belum ada varian.</p>
                            @endif
                            <form action="{{ route('variant.store') }}" method="POST" class="mt-2">
                                @csrf
                                <div class="input-group">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="text" name="variant_name" class="form-control" placeholder="Nama Varian" required>
                                    <button class="btn btn-success" type="submit">Tambah Varian</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">Belum ada produk. Silakan tambahkan produk baru.</div>
            @endif
        </div>
    </div>
</div>
@endsection
