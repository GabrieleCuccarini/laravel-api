<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProjectController extends Controller {
    
    public function index() {
    //$page = $request->input("page");
    //dd($page); 
    
    // $projects = project::all();
    /* $projects = project::where("user_id", 2)
        ->where("title", "LIKE", "%project%")
        ->get(); */
    
    // paginate() di default mostra 15 elementi per pagina.
    // Possiamo chiedere un numero diverso di elementi,
    // passando un int come primo argomento della funzione
    // $projects = project::paginate(20);
    $projects = Project::all();
    return response()->json($projects);
    }

    public function show(Project $project) {

        $project->load("type", "technologies");
    
        return response()->json($project);
    }
}