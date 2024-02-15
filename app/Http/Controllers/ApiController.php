<?php

namespace App\Http\Controllers;

//----> Dependencies
use Illuminate\Http\Request;

//----> Models
use App\Models\Equipment;


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
}
