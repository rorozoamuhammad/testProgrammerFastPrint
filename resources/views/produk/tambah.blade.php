@extends('layout.layout')

@section('content')
<div class="card-body">
    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label font-weight-bold">Nama Produk</label>
            <input type="text" name="nama_produk" 
                   class="form-control @error('nama_produk') is-invalid @enderror" 
                   value="{{ old('nama_produk') }}" placeholder="Masukkan nama produk">
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
                       value="{{ old('harga') }}" placeholder="Contoh: 15000">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <small class="text-muted">Gunakan angka saja tanpa titik/koma.</small>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $k)
                        <option value="{{ $k->id_kategori }}" {{ old('kategori_id') == $k->id_kategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select name="status_id" class="form-select @error('status_id') is-invalid @enderror">
                    <option value="">-- Pilih Status --</option>
                    @foreach($statuses as $s)
                        <option value="{{ $s->id_status }}" {{ old('status_id') == $s->id_status ? 'selected' : '' }}>
                            {{ $s->nama_status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <div class="d-flex justify-content-between">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </div>
    </form>
</div>
@endsection