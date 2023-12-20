<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_poll',
        'option',
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'id_poll', 'id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'option_id', 'id');
    }
}
