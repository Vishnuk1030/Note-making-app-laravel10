<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Note extends Model
{
    use HasFactory;
    use Cachable;

    protected $table = 'notes';

    protected $fillable = [
        'title',
        'content',
        'file'
    ];
}
