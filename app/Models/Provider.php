<?php

namespace App\Models;

//----> Dependencies
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';


    //----> Relations
    public function equipments():BelongsToMany
    {
        return $this->BelongsToMany(Equipment::class, 'provider_equipment');
    }
}
