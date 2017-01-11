<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Project;
use App\Task;
use Carbon\Carbon;
use Request;
use Input;
Use Redirect;



class TasksController extends Controller {

    public function index(Project $project)
    {
        return view('tasks.index', compact('project'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('project', 'task'));
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }


    public function store(CreateTaskRequest $request, Project $project)
    {

        Task::create( ['name'=> $request['name'],'slug'=>$request['slug'], 'description'=>$request['description'],'project_id'=>$project->id] );

        \Flash::info('Your task has been created');

        return Redirect::route('projects.show', $project->slug);
    }

    public function update(CreateTaskRequest $request, Project $project, Task $task)
    {


        $task->update( ['name'=> $request['name'],'slug'=>$request['slug'], 'description'=>$request['description'], 'completed'=>$request['completed'], 'updated_at'=>Carbon::now()] );


        \Flash::success('Your task has been updated');
        return Redirect::route('projects.tasks.show', [$project->slug, $request['slug']]);
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        \Flash::warning('Your task has been deleted')->important();
        return Redirect::route('projects.show', $project->slug);
    }


}
