<?php

namespace App\Models;

use App\Observers\CopyImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'saved' => CopyImage::class,
    ];

}
