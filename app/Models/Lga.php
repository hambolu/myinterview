<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;

    protected $tableName = 'lga';

    public function lga()
    {
        return $this->hasOne(State::class);
    }
}
