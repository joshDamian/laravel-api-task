<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = ['url'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'website_id');
    }

    public function subscribedUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
