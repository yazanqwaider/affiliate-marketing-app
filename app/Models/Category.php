<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['name', 'type'];

    public $timestamps = false;

    /** Scopes */
    public function scopeIncome($query) {
        return $query->where('type', 'income');
    }

    public function scopeExpenses($query) {
        return $query->where('type', 'expenses');
    }

    public function scopeForCurerentUser($query) {
        return $query->where('user_id', Auth::id());
    }

}
