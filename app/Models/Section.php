<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    public function Module()
    {
        return $this->hasMany(Module::class,'');
    }
}
