<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = 'pizza';
    protected $fillable = ['nev', 'kategorianev', 'vegetarianus'];

    protected $casts = [
        'vegetarianus' => 'boolean',
    ];

    // Több az egyhez (belongsTo): a pizza egy kategóriába tartozik
    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class, 'kategorianev', 'nev');
    }

    // Egy a többhöz (hasMany): egy pizzához több rendelés tartozik
    public function rendelesek()
    {
        return $this->hasMany(Rendeles::class, 'pizzanev', 'nev');
    }
}
