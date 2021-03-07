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
        'aulaFiles',
        'imageFont',
        'references'
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'userId');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
