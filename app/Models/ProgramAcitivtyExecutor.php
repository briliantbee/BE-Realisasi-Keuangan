<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAcitivtyExecutor extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'program_acitivty_executors';
    protected $fillable = [
        'program_activity_id',
        'executor_id'
    ];

    public $timestamps = false;

    public function program_activity()
    {
        return $this->belongsTo(ProgramActivity::class, 'program_activity_id');
    }

    public function executor()
    {
        return $this->belongsTo(Param::class, 'executor_id');
    }
}
