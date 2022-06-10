<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'role_id', 
        'username', 
        'first_name', 
        'last_name', 
        'email', 
        'phone', 
        'gender', 
        'date_of_birth', 
        'pic_path', 
        'have_address',
        'thumbnail',
        'address', 
        'state', 
        'country', 
        'postal_code'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
