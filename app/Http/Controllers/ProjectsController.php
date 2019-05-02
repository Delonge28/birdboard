<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store() {

        //validate
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        //persist
        Project::create($attributes);

        //redirect
        return redirect('projects');
    }

    public function show(Project $project) {

        //$project = Project::findOrFail(request('id'));

        return view('projects.show', compact('project'));
    }
}
