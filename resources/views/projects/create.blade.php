@extends('layouts/master')

@section('content')
    <h2>Create Project</h2>

    {!! Form::model(new App\Models\Project, ['route' => ['projects.store']]) !!}
        @include('projects/partials/_form', ['submit_text' => 'Create Project'])
    {!! Form::close() !!}
@endsection
