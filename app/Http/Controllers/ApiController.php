<?php

namespace App\Http\Controllers;

//----> Dependencies
use Illuminate\Http\Request;

//----> Models
use App\Models\Equipment;
use App\Models\Provider;

class ApiController extends Controller
{
    public function equipments_of_provider(string $id, Request $request)
    {
        $equipments = Equipment::with(['category' => function($query){
                return $query->select('id','name');
            }])
            ->select('id','name','price','category_id')
            ->join('provider_equipment', 'provider_equipment.equipment_id', 'equipments.id')
            ->where('provider_equipment.provider_id', $id) 
            ->paginate(10);
            
        return response()->json($equipments);
    }

    public function providers_of_equipment(string $id, Request $request)
    {
        $equipments = Provider::select('id','name','province', 'province_id')
            ->join('provider_equipment', 'provider_equipment.provider_id', 'providers.id')
            ->where('provider_equipment.equipment_id', $id) 
            ->paginate(10);
            
        return response()->json($equipments);
    }
}
