<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'files';
    protected $fillable = [
        'type',
        'reference_id',
        'file'
    ];

    public $appends = [
        'file_path'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }

    protected function filePath(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('') . Storage::url($this->attributes['file']),
        );
    }
}
