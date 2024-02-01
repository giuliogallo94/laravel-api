@extends('layouts.admin')

@section('content')
<div class="container pt-4">
    <h1>Portfolio</h1>
    <div class="button text-end">
        <a href="{{ route('admin.projects.create')}}" class="btn btn-primary">+ Project</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Project</th>
                    <th scope="col">Link</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td><a href="{{$project->link}}">{{ $project->link }}</a></td>
                        <td>{{ $project->date }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug])}}" class="btn btn-success">Details</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', ['project' => $project->slug])}}" class="btn btn-secondary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-delete" type="submit" 
                                data-title="{{ $project->title }}">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
