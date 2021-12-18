<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rka extends Model
{
    use HasFactory;
    protected $table = 'rka';
    protected $fillable = [
        'jenis',
        'jenis_barang',
        'kode_rekening',
        'jenis_pajak',
        'is_approve_admin_zona',
        'is_approve_admin',
        'is_approve_super_admin',
        'id_user'
    ];
}
