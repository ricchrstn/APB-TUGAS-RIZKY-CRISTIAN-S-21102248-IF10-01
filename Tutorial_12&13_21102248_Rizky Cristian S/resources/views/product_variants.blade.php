@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h2 class="mb-4 text-center">Daftar Produk dan Variannya</h2>
    <a href="{{ url('/produk/tambah') }}" class="btn btn-success mb-3">Tambah Produk</a>
    @foreach($products as $product)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $product->name }}</h5>
                <div>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @if(count($product->variants) > 0)
                    <ul class="list-group list-group-flush">
                        @foreach($product->variants as $variant)
                            <li class="list-group-item">{{ $variant->variant_name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Belum ada varian.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
