<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function structure(): string {
        $model = $this;
        $structure = [$this->slug];
        while(!is_null($model->parent_id)) {
            $model = Folder::find($model->parent_id);
            array_unshift($structure, $model->slug);
        }
        array_unshift($structure, Str::slug(Auth::user()->name, '-'));
        return implode('/', $structure);
    }
}
