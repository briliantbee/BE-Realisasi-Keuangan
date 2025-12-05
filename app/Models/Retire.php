<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retire extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'retires';
    protected $fillable = [
        'name',
        'unit',
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
}
