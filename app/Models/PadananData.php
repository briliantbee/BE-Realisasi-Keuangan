<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PadananData extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'padanan_data';
    protected $fillable = [
        'segment',
        'category_id',
        'data_source_id',
        'non_jkn',
        'jkn',
        'active_jkn',
        'not_active_jkn'
    ];

    // Format created_at
    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    // Format updated_at
    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    } 

    // Relasi ke tabel params untuk category
    public function category()
    {
        return $this->belongsTo(Param::class, 'category_id');
    }

    // Relasi ke tabel params untuk data source
    public function data_source()
    {
        return $this->belongsTo(Param::class, 'data_source_id');
    }
}
