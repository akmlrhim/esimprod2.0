<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $with = 'peruntukan';

    protected $fillable = [
        'uuid',
        'kode_peminjaman',
        'nomor_peminjaman',
        'peruntukan_id',
        'nomor_surat',
        'tanggal_penggunaan',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'peminjam',
        'qr_code',
        'status'
    ];

    public function peruntukan(): BelongsTo
    {
        return $this->belongsTo(Peruntukan::class, 'peruntukan_id');
    }
}
