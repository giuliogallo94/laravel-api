<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class TrashController extends Controller
{
    public function index()
    {
        $deleteds = Project::onlyTrashed()->get();
        // dd($deleteds);
        return view('admin.projects.deleted', compact('deleteds'));
    }

    public function restore($id) 
    {
        $deleteds = Project::withTrashed()->find($id);
        $deleteds->restore();

        return redirect()->route('admin.projects.index')->with('message', 'You succesfully restored' .$deleteds->title );
    }

    public function destroy($id) 
    {
        $deleteds = Project::withTrashed()->find($id);
        $deleteds->forceDelete();

        return redirect()->route('admin.projects.deleted');
    }
}
