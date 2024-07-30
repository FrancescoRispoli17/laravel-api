@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div>Name: {{$project->title}}</div>
                <div>type: {{$project->type?->name ?: 'Null'}}</div>
                <div>Creation date: {{$project->creation_date}}</div>
                <div>Size: {{$project->size}}</div>
                <div>Technologies: 
                    @foreach ($project->technologies as $technology)
                        {{$technology->name}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection