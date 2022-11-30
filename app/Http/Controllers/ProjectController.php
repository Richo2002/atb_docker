<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\MagicConst\File;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::orderByDesc('id')->paginate(5);
        return inertia('Project', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return inertia("NewProject");
    }


    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Request::validate([
            'title' => ['max:50'],
            'description' => ['required', 'min:50'],
            'image' => ['required', 'image', 'max:512'],
        ]);

        $path = Storage::putFile('public/projects', $request->image);
        $pathArray = explode("/", $path);

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $pathArray[2],
        ]);

        return Redirect::route('projects.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return inertia("NewProject", [
            'project' => $project,
        ]);
    }


    public function update(Request $request, $id)
    {
        \Illuminate\Support\Facades\Request::validate([
            'title' => ['required', 'max:50'],
            'description' => ['required'],
        ]);

        $project = Project::findOrFail($id);

        if ( ! Storage::exists('public/projects/'.$request->image)) {

            \Illuminate\Support\Facades\Request::validate([
                'image' => ['required', 'image', 'max:512'],
            ]);

            Storage::delete('public/projects'.$project->image);

            $path = Storage::putFile('public/projects', $request->image);
            $pathArray = explode("/", $path);

            $project->image = $pathArray[2];
        }

        $project->title = $request->title;
        $project->description = $request->description;

        $project->save();

        return Redirect::route('projects.index');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        Storage::delete('public/projects/'.$project->image);
        
        $project->delete();

        return Redirect::route('projects.index');
    }
}
