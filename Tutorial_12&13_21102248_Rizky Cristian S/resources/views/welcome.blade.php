@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h1 class="display-4 mb-4">Selamat Datang di Dashboard ProdukApp</h1>
    <p class="lead mb-4">Kelola produk dan variannya dengan mudah.</p>
    <a href="{{ url('/produk') }}" class="btn btn-primary btn-lg">Lihat & Kelola Produk</a>
</div>
@endsection
