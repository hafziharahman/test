@extends('layout.app')

@section('content')
    <div class="container col-md-5 mt-5">
        <h5>{{ $image->nama_foto }}</h5>
        <div class="flex flex-wrap gap-4">
            <img src="{{ asset('storage/' . $image->file_foto) }}" height="600" class="card-img-top -2" alt="{{ $image->nama_foto }}">
            <button class="download-button btn btn-outline-secondary" onclick="downloadImage('{{ $image->nama_foto }}')">Download</button>
        </div>
        <p>{{ $image->deskripsi_foto }}</p>

        <!-- Formulir Komentar -->
        <form action="{{ route('images.addComment', $image->id) }}" method="POST">
            @csrf
            <input type="hidden" name="image_id" value="{{ $image->id }}">
            <div class="mb-3">
                <label for="body" class="form-label">Tambahkan Komentar:</label>
                <textarea class="form-control" id="body" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

        <div class="card mt-3">
            <div class="card-header">
                Komentar
            </div>
            <div class="card-body">
                @foreach ($comments as $item)
                <div class="">
<b>                    {{ '@' }}{{ $image->user->name }}</b>
                    "{{ $item->content }}"
                </div>
                @endforeach
            </div>
        </div>

    <script>
        function downloadImage(nama_foto) {
            // Jika ingin melakukan operasi khusus sebelum pengunduhan, bisa diimplementasikan di sini

            // Simulasi pengunduhan menggunakan JavaScript
            const link = document.createElement('a');
            link.href = "{{ asset('storage/' . $image->file_foto) }}";
            link.download = nama_foto;
            link.click();
        }
    </script>
@endsection
