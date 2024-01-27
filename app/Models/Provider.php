<?php

namespace App\Models;

//----> Dependencies
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Provider extends Model
{
    use HasFactory;

    //----> Relations
    public function equipments():BelongsToMany
    {
        return $this->BelongsToMany(Provider::class, 'provider_equipment');
    }
}
