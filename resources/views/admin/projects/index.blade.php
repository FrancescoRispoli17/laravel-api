@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col py-5">
            <h1>Projects List</h1>
        </div>
        <div class="col-auto py-5 me-5">
            <a type="button" class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add new</a>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="col-2">Title</th>
              <th scope="col" class="col-3">Slug</th>
              <th scope="col">Creation date</th>
              <th scope="col" class="col-2">Size</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($projects as $project)
                  <tr>
                    <td>{{$project->title}}</td>
                    <td>{{$project->slug}}</td>
                    <td>{{$project->creation_date}}</td>
                    <td>{{$project->size}} Kb</td>
                    <td class="px-0"><a type="button" class="btn btn-light" href="{{route('admin.projects.show', $project)}}">Detail</a></td>
                    <td class="px-0"><a type="button" class="btn btn-primary" href="{{route('admin.projects.edit', $project)}}">Update</a></td>
                    <td class="px-0">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$project->id}}"> Delete </button>
                        <div class="modal fade" id="{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  It will no longer be possible to recover the record
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                            @csrf   
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                  </tr>
              @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection