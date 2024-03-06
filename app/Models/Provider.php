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
    protected $fillable = [
        'name',
        'image',
        'web',
        'mail',
        'phone',
        'province_id',
        'province',
        'city_id',
        'city',
        'department_id',
        'department',
        'address'
    ];


    //----> Relations
    public function equipments():BelongsToMany
    {
        return $this->BelongsToMany(Equipment::class, 'provider_equipment');
    }
}
