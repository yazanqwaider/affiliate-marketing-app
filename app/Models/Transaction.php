<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $guarded = [];

    /** Accessors And Mutators */
    public function getAmountWithSignAttribute() {
        $category_type = $this->category->type;
        return ($category_type == 'income')? abs($this->amount) : -1 * abs($this->amount);
    }

    /** Relationships */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
