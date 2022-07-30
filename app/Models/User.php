<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthdate' => 'date',
    ];

    /** Accessors And Mutators */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getReferralLinkAttribute() {
        return route('auth.register', ['ref' => base64_encode($this->id)]);
    }    

    /** Relationships */
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function referer_user() {
        return $this->belongsTo(User::class, 'referer_user_id');
    }

    public function referred_users() {
        return $this->hasMany(User::class, 'referer_user_id');
    }

    public function categories() {
        return $this->hasMany(Category::class, 'user_id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'user_id')->latest();
    }

    public function expenses_transactions() {
        return $this->hasManyThrough(Transaction::class, Category::class, 'user_id', 'category_id')->where('type', 'expenses');
    }

    public function income_transactions() {
        return $this->hasManyThrough(Transaction::class, Category::class, 'user_id', 'category_id')->where('type', 'income');
    }
}
