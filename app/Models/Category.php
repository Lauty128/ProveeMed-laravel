<?php

namespace App\Models;

//----> Dependencies
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $timestamps = false;

    //----> Relations
    function equipments():HasMany
    {
        return $this->hasMany(Equipment::class); 
    }
}
