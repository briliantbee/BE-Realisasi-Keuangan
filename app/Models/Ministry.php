<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'ministries';
    protected $fillable = [
        'kl_id',
        'budget',
        'realization',
        'date',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }
    
    public function getDateAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function kl()
    {
        return $this->belongsTo(Kl::class, 'kl_id');
    }
}
