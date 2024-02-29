<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auteur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prénom'];

    public function livres()
    {
        return $this->hasMany(Livre::class);


    }
}
