@extends('app')

@section('content')

    <h2>Create Project</h2>
    <hr/>

    {!! Form::model(new App\Project, ['route' => 'projects.store']) !!}
        @include('projects.partials._form', ['submit_text'=> 'Create Project'])
    {!! Form::close() !!}

@endsection
