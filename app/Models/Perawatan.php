<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perawatan extends Model
{
	use HasFactory;

	protected $table = 'perawatan';
	protected $with = ['barang'];

	protected $fillable = [
		'uuid',
		'kode_perawatan',
		'kode_barang',
		'jenis_perawatan',
		'status',
		'keterangan'
	];

	public function barang(): BelongsTo
	{
		return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
	}
}
