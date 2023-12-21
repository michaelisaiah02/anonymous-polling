<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $with = ['user'];

    protected $fillable = [
        'id_poll',
        'user_id',
        'statement',
        'waktu_selesai',
        'created_by',
    ];

    public function getRouteKeyName()
    {
        return 'id_poll';
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'id_poll', 'id_poll');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_poll', 'id_poll');
    }
}
