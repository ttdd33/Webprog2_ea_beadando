<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Rendeles extends Model
{
    protected $table = 'rendeles';
    protected $fillable = ['pizzanev', 'darab', 'felvetel', 'kiszallitas'];

    protected $casts = [
        'felvetel' => 'datetime',
        'kiszallitas' => 'datetime',
    ];

    

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizzanev', 'nev');
    }
}
