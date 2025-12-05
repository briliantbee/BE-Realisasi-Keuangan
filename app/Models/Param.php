<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'params';
    protected $fillable = [
        'parent_id',
        'category_id',
        'params',
        'order'
    ];

    public $timestamps = false;
}
