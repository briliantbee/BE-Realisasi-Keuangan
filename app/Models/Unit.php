<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'units';
    protected $fillable = [
        'id',
        'code',
        'parent_code',
        'name'
    ];

    public $timestamps = false;

    public function realization()
    {
        return $this->hasMany(Realization::class, 'code', 'code');
    }
}
