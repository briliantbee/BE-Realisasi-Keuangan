<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'monevs';
    protected $fillable = [
        'program_activity_id',
        'date',
        'target',
        'realization',
        'unit_id',
        'narasi',
        'constraint',
        'solution'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    } 

    public function program_activity()
    {
        return $this->belongsTo(ProgramActivity::class, 'program_activity_id');
    }

    public function unit()
    {
        return $this->belongsTo(Param::class, 'unit_id');
    }
}
