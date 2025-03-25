<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailPengembalian extends Model
{
	use HasFactory;

	protected $table = 'detail_pengembalian';
	protected $with = ['barang'];
	protected $fillable = [
		'uuid',
		'kode_pengembalian',
		'kode_barang',
		'status',
		'deskripsi',
	];

	public function barang(): BelongsTo
	{
		return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
	}
}
