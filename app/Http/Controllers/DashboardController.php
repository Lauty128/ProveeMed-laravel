<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Each methods of this class has the middleware "Auth"
    public function providers_list(){
        // return response()->json([ 'section' => 'Providers' ]);
        return view('dashboard.providers');
    }

    public function equipments_list(){
        // return response()->json([ 'section' => 'Equipments' ]);
        return view('dashboard.equipments');
    }
}
