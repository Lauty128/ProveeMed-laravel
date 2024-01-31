<?php

namespace App\Http\Controllers;

//----> Dependencies
use Illuminate\Http\Request;

//----> Models
use App\Models\Provider;
use App\Models\Equipment;


class WebController extends Controller
{

    public function home()
    {
        return view('home');
    } 

    public function providers(Request $request)
    {
        $providers = Provider::paginate(15);

        // return response()->json($providers       );
        return view('providers', compact('providers'));
    }
}
