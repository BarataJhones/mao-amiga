<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = 'aulas';

    protected $fillable = [
        'title',
        'userId',
        'content',
        'grade',
        'discipline',
        'image',
        'aulaVideo',
        'imageFont',
        'references'
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'userId');
    }

    public function events() {
        return $this->hasMany('App\Models\Aula');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'aula')->whereNull('parent_id');
    }
}
