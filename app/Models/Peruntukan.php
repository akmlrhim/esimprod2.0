<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peruntukan extends Model
{
	use HasFactory;

	protected $table = 'peruntukan';
	protected $fillable = ['uuid', 'peruntukan'];

	public function peminjaman(): HasMany
	{
		return $this->hasMany(Peminjaman::class);
	}
}
