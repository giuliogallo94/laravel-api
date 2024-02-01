@extends('layouts.admin')

@section('content')
<div class="container pt-4">
    <h1>Deleted Projects</h1>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($deleteds as $deleted)
                    <tr>
                        <th scope="row">{{ $deleted->id }}</th>
                        <td>{{ $deleted->title }}</td>
                        <td><a href="{{$deleted->link}}">{{ $deleted->link }}</a></td>
                        <td>{{ $deleted->date }}</td>
                        <td>
                            <form action="{{ route('admin.projects.restore', ['id' => $deleted->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success" type="submit">Restore</button>
                            </form>
                        </td>
                  
                        <td>
                            <form action="{{ route('admin.projects.destroy', ['project' => $deleted->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-delete" type="submit" 
                                data-title="{{ $deleted->title }}">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection