<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Kl extends Model
{
    use HasFactory;

    protected $table = 'kls';
    protected $fillable = [
        'name',
        'order',
        'photo',
    ];

    public $timestamps = false;

    protected $appends = [
        'photo_url'
    ];
    
    public function ministry()
    {
        return $this->hasOne(Ministry::class, 'kl_id');
    }

    public function getPhotoUrlAttribute()
    {
        return !empty($this->attributes['photo']) ? asset($this->attributes['photo']) : null;
    }
}
