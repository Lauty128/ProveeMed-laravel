<?php

namespace App\Models;

//----> Dependencies
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    //----> Relations
    public function providers():BelongsToMany
    {
        return $this->BelongsToMany(Equipment::class, 'provider_equipment');
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
