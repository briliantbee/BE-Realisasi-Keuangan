<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'notes';
    protected $fillable = [
        'title',
        'name',
        'institution',
        'date',
        'content',
        'instruction',
        'participant',
        'material_preparation'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    } 

    protected function participant(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
        );
    }

    protected function materialPreparation(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
        );
    }

    public function note_unit()
    {
        return $this->hasMany(NoteUnit::class, 'note_id');
    }

    public function note_follow_up ()
    {
        return $this->hasMany(NoteFollowUp::class, 'note_id');
    }

    public function note_file()
    {
        return $this->hasMany(File::class, 'reference_id')->where('type', 'note');
    }

    public function document_notulensi()
    {
        return $this->hasMany(File::class, 'reference_id')->where('type', 'document_notulensi');
    }
}
