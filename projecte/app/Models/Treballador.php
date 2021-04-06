<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treballador extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'treballador';

    protected $fillable = [
        'nifTreballador',
        'nomTreballador',
        'cognomsTreballador',
        'adrecaTreballador',
        'poblacioTreballador',
        'comarcaTreballador',
        'fixeTreballador',
        'mobilTreballador',
        'correuTreballador',
        'dataIngresTreballador',
        'associacio_id',
    ];
}
