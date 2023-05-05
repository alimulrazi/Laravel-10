<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description'];

    //mutator for name column for Laravel 8 and previous version
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    //accessor for name column for Laravel 8 and previous version
    public function getNameAttribute($value): string
    {
        return strtoupper($value);
    }

    //mutator and accessor for description column for Laravel 9+
    public function description() : Attribute
    {
        return new Attribute(
            get: fn($value) => strtoupper($value),
            set: fn($value) => strtolower($value)
        );
    }

    //mutator and accessor for name column for Laravel 9+
    public function price(): Attribute
    {
        return new Attribute(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100
        );
    }

    //mutator and accessor for date column for Laravel 9+
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('m/d/Y'),
            //set: fn ($value) =>  Carbon::parse($value)->format('Y-m-d'),
        );
    }
}