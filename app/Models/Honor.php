<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'honors';
    protected $fillable = [
        'satker_code',
        'value',
        'data_target',
        'data_input',
        'realization_value',
        'paid',
        'date',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    } 

    public function getDateAttribute($date) {
        return Carbon::parse($date)->format('d-m-Y');
    }
    
    public function province()
    {
        return $this->belongsTo(Province::class, 'satker_code', 'satker_code');
    }
    
}
