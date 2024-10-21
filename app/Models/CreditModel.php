<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'credits';

    protected $fillable = [
        'project_leader',
        'system_analyst',
        'frontend_developer',
        'backend_developer',
        'uiux_designer',
        'administrator_contact',
        'guidebook'
    ];
}
