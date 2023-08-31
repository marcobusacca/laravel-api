<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){

        $types = Type::all();

        // $types = Type::with('projects')->get(); EAGER LOADING SENZA PAGINAZIONE
        // $types = Type::with('projects')->paginate(2); // EAGER LOADING CON PAGINAZIONE

        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }

    public function show($slug){
        
        // $type = Type::where('slug', $slug)->first();

        $type = Type::with('projects')->where('slug', $slug)->first(); // EAGER LOADING SENZA PAGINAZIONE (NESSUNA PAGINAZIONE NELLO SHOW)

        if($type){
            
            return response()->json([
                'success' => true,
                'type' => $type
            ]);

        } else{

            return response()->json([
                'success' => false,
                'error' => 'Nessuna tipologia trovata'
            ]);
        }
    }
}