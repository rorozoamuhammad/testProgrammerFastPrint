@extends('layout.layout')

@section('content')
<div class="card-body">
    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label font-weight-bold">Nama Produk</label>
            <input type="text" name="nama_produk" 
                   class="form-control @error('nama_produk') is-invalid @enderror" 
                   value="{{ old('nama_produk', $produk->nama_produk) }}">
            @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label font-weight-bold">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="harga" 
                       class="form-control @error('harga') is-invalid @enderror" 
                       value="{{ old('harga', $produk->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select">
                    @foreach($kategoris as $k)
                        <option value="{{ $k->id_kategori }}" {{ (old('kategori_id', $produk->kategori_id) == $k->id_kategori) ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select name="status_id" class="form-select">
                    @foreach($statuses as $s)
                        <option value="{{ $s->id_status }}" {{ (old('status_id', $produk->status_id) == $s->id_status) ? 'selected' : '' }}>
                            {{ $s->nama_status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <div class="d-flex justify-content-between">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Update Produk</button>
        </div>
    </form>
</div>
@endsection