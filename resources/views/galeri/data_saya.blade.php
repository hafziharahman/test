@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                    <img src="{{ asset('storage/' . $item->file_foto) }}" height="600" class="card-img-top" alt="{{ $item->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_foto }}</h5>
                            <p class="card-text">{{ $item->deskripsi_foto }}</p>
                        </div>
                        <div class="card-footer">
                            {{ $item->user->name }}
                            <a href="{{ route('images.edit', $item->id) }}" class="btn btn-outline-warning btn-sm float-right">
                                edit
                            </a>
                            <!-- Form untuk tombol delete -->
                            <form action="{{ route('images.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm float-right mr-2">
                                    delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
