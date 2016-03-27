<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;
use App\Http\Controllers;

class ProjectsController extends Controller
{
    protected $roles = [
        'name' => ['required' => 'min:3'],
        'slug' => ['required'],
    ];

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $input = Input::all();
        Project::create($input);

        return Redirect::route('projects.index')->with('message', 'Project created');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function update(Project $project, Request $request)
    {
        $this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
        $project->update($input);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated');
    }

    public function destoroy(Project $project)
    {
        $project->delete();

        return Redirect::route('projects.index')->with('message', 'Project deleted');
    }
}
