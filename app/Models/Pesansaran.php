<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Pesansaran extends Model
{
    use HasFactory;

    //Kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];

    //Relasi Many-to-One dengan model User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
