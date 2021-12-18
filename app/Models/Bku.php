<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bku extends Model
{
    use HasFactory;
    protected $table = 'bku';
    protected $fillable = [
        'jenis',
        'jumlah',
        'is_added',
        'is_approve_admin_zona',
        'is_approve_admin',
        'is_approve_super_admin',
        'id_user'
    ];
}
