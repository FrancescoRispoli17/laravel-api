<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){

        if(isset($request->title) && ($request->title != null))
        {
            $projects = Project::where('title',$request->title)->with('type')->paginate(16);
        }
        else
            $projects = Project::with('type')->paginate(16);

        return response()->json([
            'status' => true,
            'results' =>$projects
        ]);
    }

    public function show(string $slug){

        $project = Project::where('slug',$slug)->with('technologies','type')->first();
        if($project){
            return response()->json([
                'status' => true,
                'results' =>$project
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'results' =>null
            ],404);
        }
        return response()->json($project);
    }
    

}
