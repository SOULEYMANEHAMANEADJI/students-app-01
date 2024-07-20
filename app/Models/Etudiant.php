<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    protected $fillable = [
        'name',
        'unsername',
        'age',
        'level',
        'classe_id'
    ];
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
