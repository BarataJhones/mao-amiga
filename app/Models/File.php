<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'aula_id',
        'filePath',
        'title'
    ];

    public function aula()
    {
        return $this->belongsTo(Aula :: class, 'aula_id');
    }

}
