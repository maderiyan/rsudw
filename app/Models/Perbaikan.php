<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;

    protected $table = 'perbaikan';
    protected $fillable = ['judul', 'keterangan', 'status', 'user_id', 'tgl_pengajuan', 'user_assign', 'user_pemohon', 'tgl_selesai', 'tgl_estimasi'];
    // protected $primaryKey = 'id_perbaikan';

    public function eviden() {
      return $this->hasMany(Eviden::class, 'perbaikan_id', 'id');
    }
}
