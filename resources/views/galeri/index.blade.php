@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($data as $item)
            <div class="col-md-4 mb-4">
                <a href="{{ route('detail_image', $item->id) }}">
                <div class="card">
                    <img src="{{ asset('storage/' . $item->file_foto) }}" height="600" class="card-img-top" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_foto }}</h5>
                        <p class="card-text">{{ $item->deskripsi_foto }}</p>
                    </div>
                    <div class="card-footer">
                        Username :{{ $item->user->name }}
                    </div>
                    
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
