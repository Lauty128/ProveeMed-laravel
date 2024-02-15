<?php

namespace App\Http\Controllers;

//----> Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

//----> Models
use App\Models\Provider;
use App\Models\Equipment;
use App\Models\Category;
use App\Models\ProviderEquipment;


class WebController extends Controller
{
    //----------------------------> Local <---------------------------------
    public function filters_providers()
    {
        // Manage filters of providers
        return null;
    }

    public function filters_equipments()
    {
        // Manage filters of equipments
        return null;
    }

    //----------------------------> Controllers <----------------------------
    //-- HOME
    public function home()
    {
        return view('home');
    } 

    //-- PROVIDERS
    public function providers(Request $request)
    {
        // Configs
        $orders = [
            1 => [ 'field' => 'providers.id', 'type' => 'ASC' ],
            2 => [ 'field' => 'providers.id', 'type' => 'DESC' ],
            3 => [ 'field' => 'providers.name', 'type' => 'ASC' ],
            4 => [ 'field' => 'providers.name', 'type' => 'DESC' ],
        ];

        $providers_query = Provider::select('providers.id','providers.name','providers.province_id','providers.province')
                                ->where('providers.available', '1'); // Call only active providers

        //----> Config filters of query
        if($request->name){
            $providers_query->where('providers.name','like','%'.$request->name.'%');
        }
        if($request->category && ($request->category != '-1')){
            $providers_query->join('provider_equipment', 'provider_equipment.provider_id', 'providers.id')
                ->join('equipments', 'equipments.id', 'provider_equipment.equipment_id')
                ->where('equipments.category_id', $request->category)
                ->distinct();
        }
        if($request->province && ($request->province != '-1')){
            $providers_query->where('providers.province_id', $request->province);
        }

        //----> Config order 
        if($request->order && ($request->order >= 1) && ($request->order <= 4)){
            $order = $orders[$request->order];
            $providers_query->orderBy($order['field'], $order['type']);
        }

        $providers = $providers_query->paginate(15);

        //----> Get data to the filters
        $categories = Category::all();
        $provinces = App::make('provinces');

        //----> Return
        return view('providers', compact('providers','categories','provinces'));
    }

    //-- EQUIPMENTS
    public function equipments(Request $request)
    {
        // Configs
        $orders = [
            1 => [ 'field' => 'equipments.id', 'type' => 'ASC' ],
            2 => [ 'field' => 'equipments.id', 'type' => 'DESC' ],
            3 => [ 'field' => 'equipments.name', 'type' => 'ASC' ],
            4 => [ 'field' => 'equipments.name', 'type' => 'DESC' ],
            5 => [ 'field' => 'equipments.price', 'type' => 'ASC' ],
            6 => [ 'field' => 'equipments.price', 'type' => 'DESC' ],
        ];

        $equipments_query = Equipment::with('category')->select('id','name','category_id','price');

        //----> Config filters of query
        if($request->name){
            $equipments_query->where('equipments.name','like','%'.$request->name.'%');
        }
        if($request->category && ($request->category != '-1')){
            $equipments_query->where('category_id', $request->category);
        }

        //----> Config order 
        if($request->order && ($request->order >= 1) && ($request->order <= 6)){
            $order = $orders[$request->order];
            $equipments_query->orderBy($order['field'], $order['type']);
        }

        $equipments = $equipments_query->paginate(15);

        //----> Get data to the filters
        $categories = Category::all();

        //----> Return
        return view('equipments', compact('equipments', 'categories'));
    }

    //-- PROVIDER
    public function provider(string $id){
        $provider = Provider::find($id);
        if(!$provider) return redirect()->route('not-found');

        // Get categories what the provider sales
        $categories = DB::table('categories', 'c')
            ->select(['c.id', 'c.name'])
            ->join('equipments', 'c.id', 'equipments.category_id')
            ->join('provider_equipment', 'equipments.id', 'provider_equipment.equipment_id')
            ->where('provider_equipment.provider_id', $id)
            ->distinct()
            ->get();

        return view('provider', compact('provider', 'categories'));
    }

    
    
}
