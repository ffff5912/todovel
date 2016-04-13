<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Project;
use App\Http\Controllers;
use App\Repository\ProjectRepositoryInterface;
use App\Service\ProjectService;

class ProjectsController extends Controller
{
    private $project_repository;
    private $service;

    protected $rules = [
        'name' => ['required' => 'min:3'],
        'slug' => ['required'],
    ];

    public function __construct(ProjectRepositoryInterface $project_repository, ProjectService $service)
    {
        $this->project_repository = $project_repository;
        $this->service = $service;
    }

    public function index()
    {
        $projects = $this->project_repository->findAll();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $this->service->register($request);

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
        $this->project_repository->update($input, $project->id);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated');
    }

    public function destroy(Project $project)
    {
        $this->project_repository->destroy($project->id);

        return Redirect::route('projects.index')->with('message', 'Project deleted');
    }
}
