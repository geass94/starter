<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['folder_id','user_id','name','original_name','mime','extension','size','slug','url'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
