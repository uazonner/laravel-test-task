<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Vocabulary;

class Hash extends Model
{
    protected $table = 'hashes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hash', 'algorithm',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vocabulary() {
        return $this->belongsTo(Vocabulary::class);
    }
}
