<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $with = ['user', 'option', 'poll'];

    protected $fillable = [
        'user_id',
        'option_id',
        'id_poll',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id', 'id_poll');
    }
}
