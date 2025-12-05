<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityScale extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'priority_scales';
    protected $fillable = [
        'type',
        'data'
    ];

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => !empty($attributes['created_at']) ? Carbon::parse($attributes['created_at'])->format('Y-m-d H:i:s') : null
        );
    }

    public function updatedAt(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => !empty($attributes['updated_at']) ? Carbon::parse($attributes['updated_at'])->format('Y-m-d H:i:s') : null
        );
    }

    public function data(): Attribute 
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
        );
    }
}
