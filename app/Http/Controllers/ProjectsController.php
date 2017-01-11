<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Carbon\Carbon;
use Input;
use Redirect;


class ProjectsController extends Controller {


    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));


    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(CreateProjectRequest $request)
    {

        Project::create( ['name'=> $request['name'],'slug'=>$request['slug']] );


        \Flash::success('Your project has been created');

        return Redirect::route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(CreateProjectRequest $request, Project $project)
    {

        $project->update( ['name'=> $request['name'],'slug'=>$request['slug'], 'updated_at'=>Carbon::now()] );


        \Flash::info('Your project has been updated');
        return Redirect::route('projects.show', $project->slug);
    }


    public function destroy(Project $project)
    {
        $project->delete();

        //flash("Project deleted")->important();

        \Flash::warning('Your project has been deleted')->important();



        return Redirect::route('projects.index');

    }

}