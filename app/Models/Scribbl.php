<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scribbl extends Model
{
    use HasFactory;


    /**
     * A list of mass-assignable attributes.
     *
     */
    protected $fillable = [
        'owner',
        'title',
        'description',
    ];
}
