<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return response()->json([
            'results' => $projects,
            'success' => true
        ]);
    }

    public function show($slug) {
        $project = Project::with('technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'results' => $project,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nessun post trovato'
            ]);
        }
    }
}
