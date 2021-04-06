<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associacio extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = 'associacio';

    protected $fillable = [
        'cif',
        'nomAssociacio',
        'adrecaAssociacio',
        'poblacioAssociacio',
        'comarcaAssociacio',
        'tipus',
        'esDeclarada',
    ];


}
