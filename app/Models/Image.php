<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['nama_foto', 'file_foto', 'deskripsi_foto', 'id_pengguna'];

    public function user() {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

}
