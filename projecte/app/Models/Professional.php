<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'professional';

    protected $fillable = [
        'treballador_id',
        'carrec',
        'seguretatSocial',
        'percentatgeIRPF',
    ];
}
