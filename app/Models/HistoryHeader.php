<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryHeader extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seller() {
        return $this->hasOne(User::class, 'user_id');
    }

    public function historydetail() {
        return $this->hasMany(HistoryDetail::class);
    }

}
