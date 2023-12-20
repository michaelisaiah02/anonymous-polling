<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_poll',
        'user_id',
        'statement',
        'waktu_selesai',
        'created_by',
    ];

    public function options()
    {
        return $this->hasMany(Option::class, 'id_poll', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'poll_id', 'id');
    }
}
