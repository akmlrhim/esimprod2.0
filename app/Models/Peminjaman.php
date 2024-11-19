<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $with = ['barang'];

    protected $fillable = [
        'uuid',
        'kode_peminjaman',
        'peruntukan_id',
        'nomor_surat',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'peminjam',
        'petugas'
    ];

    public function peruntukan(): BelongsTo
    {
        return $this->belongsTo(Peruntukan::class, 'peruntukan_id');
    }
}
