<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent_id','slug','user_id'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function children() {
        return $this->hasMany(Folder::class, 'parent_id', 'id');
    }
}
