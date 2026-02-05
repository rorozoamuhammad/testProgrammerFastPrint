@extends('layout.layout')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Produk (Bisa Dijual)</h5>
        <a href="{{ route('produk.create') }}" class="btn btn-light btn-sm">Tambah Produk</a>
    </div>
    <div class="card-body">    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($produks as $produk)
                    <tr>
                        <td>{{ $produk->id_produk }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td>{{ $produk->kategori->nama_kategori ?? 'Tanpa Kategori' }}</td>
                        <td><span class="badge bg-success">{{ $produk->status->nama_status ?? '-' }}</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('produk.edit', $produk->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data produk yang bisa dijual.</td>
                        </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection