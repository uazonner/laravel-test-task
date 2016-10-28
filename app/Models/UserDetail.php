<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserDetail extends Model
{
    public $timestamps = false;

    protected $table = "users_details";

    public function user() {
        return $this->belongsTo(User::class);
    }
}
