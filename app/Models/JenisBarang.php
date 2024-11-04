<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barang';

    protected $fillable = [
        'uuid',
        'kode_jenis_barang',
        'jenis_barang',
    ];

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'jenis_barang_id', 'kode_jenis_barang');
    }
}
