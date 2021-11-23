<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula_User extends Model
{
    use HasFactory;

    protected $table = 'aula_user';

    protected $fillable = [
        'aula_id',
        'user_id',
        'created_at' => 'date:D-m-y'
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aula :: class, 'aula_id');
    }

}
