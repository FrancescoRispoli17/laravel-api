@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h1>Edit</h1>   
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="mt-5">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control @if ($errors->get('title')) is-invalid @endif" id="exampleFormControlInput1" name="title" value="{{ old('title',$project->title) }}">
                        @if ($errors->get('title'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('title') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Type</label>
                        <select class="form-select  @if ($errors->get('type_id')) is-invalid @endif" aria-label="Default select example" name="type_id">
                            <option value="0" selected disabled></option>
                            @foreach ( $types as $type )
                            <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                          </select>
                          @if ($errors->get('type_id'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('type_id') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Technologies</label>
                        <div>
                            @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                @if ($errors->any()) {
                                <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', old('$project->technologies'))) ? 'checked' : ''}}>
                                <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                }
                                @else
                                <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains($technology) ? 'checked' : ''}}>
                                <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cration date</label>
                        <input type="date" class="form-control @if ($errors->get('creation_date')) is-invalid @endif" id="exampleFormControlInput1" name="creation_date" value="{{ old('creation_date',$project->creation_date) }}">
                        @if ($errors->get('creation_date'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('creation_date') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">size</label>
                        <input type="number" class="form-control @if ($errors->get('size')) is-invalid @endif" id="exampleFormControlInput1" name="size" value="{{ old('size',$project->size) }}">
                        @if ($errors->get('size'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('size') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection