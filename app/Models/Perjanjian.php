<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
    use HasFactory;
    protected $table = 'perjanjian';
    protected $fillable = [
        'jumlah',
        'is_approve_admin_zona',
        'is_approve_admin',
        'is_approve_super_admin',
        'file_nota',
        'id_user'
    ];
}
