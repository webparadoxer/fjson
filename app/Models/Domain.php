<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Domain extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'json',
        'expired' => 'json',

    ];

    protected $fillable = [
        'name',
        'data',
    ];


}
