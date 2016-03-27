@extends('layouts.master')

@section('content')
    <h2>Projects</h2>

    @if ( !$projects->count() )
        You have no projects
    @else
        <ul>
            @foreach( $projects as $project )
                <li>
                    {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['projects.destroy', $project->slug]]) !!}
                    <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
                    (
                        {!! link_to_route('projects.edit', 'Edit', [$project->slug], ['class' => 'btn btn-info']) !!},
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif
    <p>
        {!! link_to_route('projects.create', 'Create Project') !!}
    </p>
@endsection
