<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $with = ['jenisBarang', 'peminjaman', 'perawatan'];

    protected $fillable = [
        'uuid',
        'kode_barang',
        'nama_barang',
        'jenis_barang_id',
        'status',
        'deskripsi',
        'qr_code',
        'limit',
        'sisa_limit',
        'foto',
    ];

    public function jenisBarang(): BelongsTo
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id', 'kode_jenis_barang');
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'kode_barang', 'kode_barang');
    }

    public function perawatan(): HasMany
    {
        return $this->hasMany(Perawatan::class, 'kode_barang', 'kode_barang');
    }
}
