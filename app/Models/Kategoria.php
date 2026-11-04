<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = 'kategoria';
    protected $fillable = ['nev', 'ar'];

    // Egy a többhöz (hasMany): egy kategóriába több pizza tartozik
    public function pizzak()
    {
        return $this->hasMany(Pizza::class, 'kategorianev', 'nev');
    }
}
