<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{

    protected $table = 'cores_produtos';
    public $timestamps = false;
    protected $fillable = [
        'nome',
      ];
}
