<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $table = 'credits';
>>>>>>> 1f47649 (fix)

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
