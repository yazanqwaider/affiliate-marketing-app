<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ["role"];

    /** Relationships */
    public function users() {
        return $this->hasMany(User::class, "role_id");
    }

}
