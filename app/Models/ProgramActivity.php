<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramActivity extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'program_activities';
    protected $fillable = [
        'user_id',
        'priority_program_id',
        'name',
        'target',
        'unit_id',
        'budget',
        'recommendation',
        'narrative',
        'narrative_outcome',
    ];

    public function getCreatedAtAttribute($date) 
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) 
    {
        return !empty($this->attributes['updated_at']) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    } 
    
    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function program_activity_executor() {
        return $this->hasMany(ProgramAcitivtyExecutor::class, 'program_activity_id');
    }

    public function monev()
    {
        return $this->hasMany(Monev::class, 'program_activity_id');
    }

    public function priority_program()
    {
        return $this->belongsTo(Param::class, 'priority_program_id');
    }
    
    public function unit()
    {
        return $this->belongsTo(Param::class, 'unit_id');
    }
}
