<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        
        // $projects = Project::all();
        // $projects = Project::with('type', 'technologies')->get(); EAGER LOADING SENZA PAGINAZIONE
        // $projects = Project::with('type', 'technologies')->paginate(2); EAGER LOADING CON PAGINAZIONE

        $projects = Project::all()->paginate(2);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug){

        // $project = Project::where('slug', $slug)->first();

        $project = Project::with('type', 'technologies')->where('slug', $slug)->first(); // EAGER LOADING SENZA PAGINAZIONE (NESSUNA PAGINAZIONE NELLO SHOW)

        if($project){
            
            return response()->json([
                'success' => true,
                'project' => $project
            ]);

        } else{

            return response()->json([
                'success' => false,
                'error' => 'Nessun progetto trovato'
            ]);
        }
    }
}