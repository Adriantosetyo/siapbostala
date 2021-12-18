<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spj extends Model
{
    use HasFactory;
    protected $table = 'spj';
    protected $fillable = [
        'file_pra_rka',
        'file_rka',
        'file_bku',
        'file_lra_bos',
        'file_register',
        'file_berita',
        'file_k7',
        'is_approve_admin_zona',
        'is_approve_admin',
        'is_approve_super_admin',
        'id_user'
    ];
}
