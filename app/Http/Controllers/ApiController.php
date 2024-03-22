<?php

namespace App\Http\Controllers;

//----> Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function equipments_that_doesnt_has_a_provider(Request $request, string $id)
    {
        $equipments = DB::table('equipments', 'e')
            ->select(['e.id','e.name', 'e.category_id','categories.name AS category_name'])
            ->join('categories', 'e.category_id', 'categories.id') // Join to get category name
            ->leftJoin('provider_equipment', function ($join) use ($id) { // Left join to provider_equipment table
                $join->on('e.id', '=', 'provider_equipment.equipment_id') // (LEFT == equipments.id)
                     ->where('provider_equipment.provider_id', '=', $id); // Force relation with the provider $id
            })
            ->where(function($query) use($id){
                $query->whereNull('provider_equipment.provider_id') // Where provider_id is null
                    ->orWhere('provider_equipment.provider_id', '!=', $id); // Or Where provider_id is different to $id
            });
            
        if($request->search) $equipments->where('e.name', 'like', '%'.$request->search.'%');
            
        $equipments = $equipments->paginate(20);

        return response()->json($equipments);
    }
}
