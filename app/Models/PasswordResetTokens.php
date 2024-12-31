<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetTokens extends Model
{
    use HasFactory;
    protected $primaryKey = 'email';
    protected $table = 'password_reset_tokens';
    protected $fillable = ['token','created_at'];
}
