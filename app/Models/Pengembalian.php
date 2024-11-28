<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $with = ['peminjaman'];

    protected $fillable = [
        'uuid',
        'kode_pengembalian',
        'kode_peminjaman',
        'tanggal_kembali',
        'peminjam',
        'status',
    ];

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, 'kode_peminjaman', 'kode_peminjaman');
    }
}
