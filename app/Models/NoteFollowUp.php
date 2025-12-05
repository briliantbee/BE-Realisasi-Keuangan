<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteFollowUp extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'note_follow_ups';
    protected $fillable = [
        'note_id',
        'user_id',
        'title',
        'target_date',
        'status',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }
    
    public function tagetDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
