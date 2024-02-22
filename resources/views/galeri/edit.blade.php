@extends('layout.app')

@section('content')
<div class="container mt-5 col-md-4">
    <div class="card">
        <div class="card-header h5">
            Form Update
        </div>
        <form action="{{ route('images.update', $image->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nama_foto" id="nama_foto" value="{{ $image->nama_foto }}" placeholder="Nama Foto">
                <label for="nama_foto">Nama Foto</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="deskripsi_foto" id="deskripsi_foto" class="form-control">{{ $image->deskripsi_foto }}</textarea>
                <label for="deskripsi_foto">Deskripsi Foto</label>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
        </form>
    </div>
</div>
@endsection
