<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $with = ['jenisBarang'];

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
}
