<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'nota';
    protected $fillable = [
        'jenis_belanja',
        'jumlah_harga',
        'file_nota',
        'id_rka'

    ];
}
