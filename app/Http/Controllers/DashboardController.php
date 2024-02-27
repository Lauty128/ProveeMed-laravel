<?php

namespace App\Http\Controllers;

//----> Dependencies
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

//----> Models
use App\Models\Provider;
use App\Models\Equipment;


class DashboardController extends Controller
{
    // Each methods of this class has the middleware "Auth"


    /*  
    ██████╗░░██████╗░░░█████╗░░██╗░░░██╗░██╗░██████╗░░███████╗░██████╗░░░██████╗
    ██╔══██╗░██╔══██╗░██╔══██╗░██║░░░██║░██║░██╔══██╗░██╔════╝░██╔══██╗░██╔════╝
    ██████╔╝░██████╔╝░██║░░██║░╚██╗░██╔╝░██║░██║░░██║░█████╗░░░██████╔╝░╚█████╗░
    ██╔═══╝░░██╔══██╗░██║░░██║░░╚████╔╝░░██║░██║░░██║░██╔══╝░░░██╔══██╗░░╚═══██╗
    ██║░░░░░░██║░░██║░╚█████╔╝░░░╚██╔╝░░░██║░██████╔╝░███████╗░██║░░██║░██████╔╝
    ╚═╝░░░░░░╚═╝░░╚═╝░░╚════╝░░░░░╚═╝░░░░╚═╝░╚═════╝░░╚══════╝░╚═╝░░╚═╝░╚═════╝░
    */
    public function providers_list(Request $request){
        $providers = new Provider();
        if($request->search) $providers = $providers->where('name', 'like', '%'.$request->search.'%');
        
        $queries = $request->all();
        $providers = $providers->paginate(15);

        return view('dashboard.providers', compact('providers', 'queries'));
    }

    public function delete_provider($id){
        $provider = Provider::find($id);

        $provider->delete();

        return redirect()->route('dashboard.providers')->with('success', 'Proveedor eliminado correctamente');
    }

    
    /*
    ███████╗░░██████╗░░██╗░░░██╗░██╗░██████╗░░███╗░░░███╗░███████╗░███╗░░██╗░████████╗░░██████╗
    ██╔════╝░██╔═══██╗░██║░░░██║░██║░██╔══██╗░████╗░████║░██╔════╝░████╗░██║░╚══██╔══╝░██╔════╝
    █████╗░░░██║██╗██║░██║░░░██║░██║░██████╔╝░██╔████╔██║░█████╗░░░██╔██╗██║░░░░██║░░░░╚█████╗░
    ██╔══╝░░░╚██████╔╝░██║░░░██║░██║░██╔═══╝░░██║╚██╔╝██║░██╔══╝░░░██║╚████║░░░░██║░░░░░╚═══██╗
    ███████╗░░╚═██╔═╝░░╚██████╔╝░██║░██║░░░░░░██║░╚═╝░██║░███████╗░██║░╚███║░░░░██║░░░░██████╔╝
    ╚══════╝░░░░╚═╝░░░░░╚═════╝░░╚═╝░╚═╝░░░░░░╚═╝░░░░░╚═╝░╚══════╝░╚═╝░░╚══╝░░░░╚═╝░░░░╚═════╝░
    */

    public function equipments_list(Request $request){
        
        $equipments = new Equipment();
        if($request->search) $equipments = $equipments->where('name', 'like', '%'.$request->search.'%');

        $equipments = $equipments->paginate(20);
        return view('dashboard.equipments' , compact('equipments'));
    }

    public function delete_equipment($id){
        $equipment = Equipment::find($id);

        $equipment->delete();

        return redirect()->route('dashboard.equipments')->with('success', 'Equipo eliminado correctamente');
    }
}
