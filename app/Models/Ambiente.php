<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'status'
    ];

        protected function casts(): array
    {
        return ['status' => 'boolean'];
    }

    public function sensores(){
        return $this->hasMany(Sensor::class);
    }
}
