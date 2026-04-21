<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tortyuzmmodel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family_name',
        'middle_name',
        'orientation',
        'gender',
        'group',
        'result',
    ];
}
