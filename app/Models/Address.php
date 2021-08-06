<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Address extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'address',
        'zip_code',
        'city',
        'state',
        'neighborhood',
    ];
}
