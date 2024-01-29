<?php

namespace App\Models;

//----> Dependencies
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderEquipment extends Model
{
    use HasFactory;
    protected $table = 'provider_equipment';
    protected $guarded = [];
    public $timestamps = false;
}
