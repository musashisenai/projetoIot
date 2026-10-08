<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ambiente_id',
        'codigo', // TEMP01, TEMP02, LED01, LED02 ...
        'tipo', //led, temperatura ...
        'descricao',
        'status' //ativo ou inativo
    ];

    protected function casts(): array
    {
        return ['status' => 'boolean'];
    }

    public function registro(): HasMany
    {
        return $this->hasMany(Registro::class);
    }

    public function ambiente(): BelongsTo
    {
        return $this->belongsTo(Ambiente::class);
    }

    public function registros()
    {
        return $this->hasMany(Registro::class);
    }

    public function ambientes()
    {
        return $this->belongsTo(Ambiente::class);
    }
}
