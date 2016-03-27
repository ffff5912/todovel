<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;
use App\Task;
use App\Http\Controllers\Controller;
use App\Repository\TaskRepositoryInterface;

class TasksController extends Controller
{
    private $task_reository;

    protected $rules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required'],
        'description' => ['required'],
    ];

    public function __construct(TaskRepositoryInterface $task_reository)
    {
        $this->task_reository = $task_reository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function index(Project $project)
    {
        return view('tasks.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Project $project
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Project $project, Request $request)
    {
        $this->validate($request, $this->rules);

        $input = Input::all();
        $input['project_id'] = $project->id;
        $this->task_reository->store($input);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Task created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @param  \App\Task    $task
     * @return Response
     */
    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('project', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @param  \App\Task    $task
     * @return Response
     */
    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project $project
     * @param  \App\Task    $task
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function update(Project $project, Task $task, Request $request)
    {
        $this->validate($request, $this->rules);

        $input = array_except(Input::all(), ['_method', '_token']);
        $input['project_id'] = $project->id;
        $this->task_reository->update($input, $task->id);

        return Redirect::route('projects.tasks.show', [$project->slug, $task->slug])->with('message', 'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @param  \App\Task    $task
     * @return Response
     */
    public function destroy(Project $project, Task $task)
    {
        $this->task_reository->destroy($task->id);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Task deleted');
    }
}
