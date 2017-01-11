@extends('app')

@section('content')

    <h2>Edit Project {{ $project->name }}</h2>
    <hr/>


    {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]]) !!}
    @include('projects/partials/_form', ['submit_text' => 'Edit Project'])
    {!! Form::close() !!}
@endsection
