<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntari extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'voluntari';

    protected $fillable = [
        'treballador_id',
        'edat',
        'professio',
        'horesDedicades',
    ];
}
