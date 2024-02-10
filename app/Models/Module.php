<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Module extends Model
{
    use HasFactory;

    protected function GetFileNameAttribute($value)
    {
        return asset('storage/'.$this->type."/".$value);
    }

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function Section(){
        return $this->belongsTo(Section::class);
    }
}
