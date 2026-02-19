<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id'];

    public function likedUsers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}
