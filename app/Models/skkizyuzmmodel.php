<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skkizyuzmmodel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family_name',
        'middle_name',
        'orientation',
        'group',
        'result',
    ];
}
