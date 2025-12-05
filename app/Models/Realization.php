<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realization extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'realizations';
    protected $fillable = [
        'code',
        'budget',
        'aa',
        'budget_aa',
        'realization_spp',
        'sp2d',
        'date',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    } 

    public function scopeJoinUnit($query)
    {
        return $query->join('units as b', 'realizations.code', '=', 'b.code')
            ->select(
                'b.parent_code',
                'b.name',
                'realizations.*'
            );
    }

    public function scopeLastData($query) {
        $last_date = Realization::orderBy('date', 'desc')->pluck('date')->first();
        return $query->join('units as b', 'realizations.code', '=', 'b.code')
            ->select(
                'b.parent_code',
                'b.name',
                'realizations.*'
            )
            ->whereDate('date', Carbon::parse($last_date)->format('Y-m-d'));
    }

    public function unit()
    {
        $this->belongsTo(Unit::class, 'code', 'code');
    }

}
