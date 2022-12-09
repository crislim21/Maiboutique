<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function historyheader() {
        return $this->belongsTo(HistoryHeader::class);
    }

    public function seller() {
        return $this->hasOne(User::class, 'user_id');
    }

    public function cart() {
        return $this->hasMany(Cart::class, 'cart_id');
    }
}
