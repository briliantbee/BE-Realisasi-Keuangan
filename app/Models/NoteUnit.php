<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteUnit extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'note_units';
    protected $fillable = [
        'note_id',
        'unit_id',
    ];

    public $timestamps = false;

    public function note()
    {
        return $this->belongsTo(Note::class, 'note_id');
    }

    public function unit()
    {
        return $this->belongsTo(User::class, 'unit_id');
    }
}
