<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = "userroles";
    protected $primaryKey = "role_id";
    
    protected $fillable = [
        'role_name'
    ];
}
