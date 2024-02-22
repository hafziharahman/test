<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use Egulias\EmailValidator\Result\Reason\CommentsInIDRight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::id();
        $data = Image::with('user')->get();
        return view('galeri.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_foto' => 'required',
            'file_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:7000',
            'deskripsi_foto' => 'required',
        ]);

        $imagePath = $request->file('file_foto')->store('images', 'public');

        $userId = Auth::id();

        $image = new Image([
            'nama_foto' => $request->get('nama_foto'),
            'file_foto' => $imagePath,
            'deskripsi_foto' => $request->get('deskripsi_foto'),
            'id_pengguna' => $userId,
        ]);

        $image->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('galeri.upload');
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('galeri.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {

        $image = Image::findOrFail($id);

        // Memperbarui data gambar
        $image->nama_foto = $request->get('nama_foto');
        $image->deskripsi_foto = $request->get('deskripsi_foto');

        // Jika ada file gambar baru yang diunggah, proses dan simpan
        if($request->hasFile('file_foto')) {
            $request->validate([
                'file_foto' => 'image|mimes:jpeg,png,jpg,gif|max:700',
            ]);

            // Menghapus file gambar lama dari storage
            Storage::disk('public')->delete($image->file_foto);

            // Menyimpan file gambar yang baru di unggah
            $imagePath = $request->file('file_foto')->store('images','public');
            $image->file_foto = $imagePath;
        }

        //Menyimpan perubahan
        $image->save();

        return redirect('/data_saya')->with('success', 'Gambar berhasil di perbarui.');

    }

    public function destroy($id)
    {
        try {
            $data = Image::find($id);
            $data->delete();

            return redirect()->back()->with('success', 'Data berhasil di hapus');
        }   catch(\Throwable $th) {
            // Tangani kesalahan jika ada
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.Silahkan coba lagi.');
        }
    }

    public function data_saya()
    {
        $user = auth()->user();
        $data = $user ? $user->images : [];
        return view('galeri.data_saya', compact('data'));
    }
    
    public function detail_image($id)
    {
        $image = Image::findOrFail($id);
        $comments = Comment::all();

        return view('galeri.detail_image', compact('image', 'comments'));
    }

    public function addComment(Request $request, $imageId)
    {

        $image = Image::findOrFail($imageId);

        $comment = new Comment([
            'content' => $request->get('content'),
            'user_id' => auth()->user()->id,
            'post_id' => $image->id,
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
