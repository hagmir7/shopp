<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'unit_type_id',
        'abbreviation',
    ];

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }
}
