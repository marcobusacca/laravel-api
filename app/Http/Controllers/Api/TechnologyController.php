<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index(){

        $technologies = Technology::all();

        // $technologies = Technology::with('projects')->get(); EAGER LOADING SENZA PAGINAZIONE
        // $technologies = Technology::with('projects')->paginate(2); // EAGER LOADING CON PAGINAZIONE

        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);
    }

    public function show($slug){
        
        // $technology = Technology::where('slug', $slug)->first();

        $technology = Technology::with('projects')->where('slug', $slug)->first(); // EAGER LOADING SENZA PAGINAZIONE (NESSUNA PAGINAZIONE NELLO SHOW)

        if($technology){
            
            return response()->json([
                'success' => true,
                'technology' => $technology
            ]);

        } else{

            return response()->json([
                'success' => false,
                'error' => 'Nessuna tecnologia trovata'
            ]);
        }
    }
}