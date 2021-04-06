<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenir extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tenir';

    protected $fillable = [
        'soci_id',
        'associacio_id',
        'dataAltaSoci',
        'quotaMensual',
        'aportacioAnual',
    ];


}
