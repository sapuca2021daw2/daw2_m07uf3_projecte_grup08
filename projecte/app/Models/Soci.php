<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soci extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'nifSoci',
        'nomSoci',
        'cognomsSoci',
        'adrecaSoci',
        'poblacioSoci',
        'comarcaSoci',
        'fixeSoci',
        'mobilSoci',
        'correuSoci',
    ];


}
