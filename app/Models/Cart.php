<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_id');
    }

    public function seller() {
        return $this->hasOne(User::class);
    }
}
