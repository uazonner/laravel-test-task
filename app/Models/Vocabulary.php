<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hash;

class Vocabulary extends Model
{
    protected $table = 'vocabulary';

    protected $fillable = [
        'word'
    ];

    public function hash() {
        return $this->hasMany(Hash::class);
    }
}
