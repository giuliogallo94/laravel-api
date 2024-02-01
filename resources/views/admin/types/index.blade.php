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
                    <th scope="col">Type</th>

                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                       
                        {{-- <td>
                            <a href="{{ route('admin.types.show', ['type' => $type->slug])}}" class="btn btn-success">Details</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.types.edit', ['type' => $type->slug])}}" class="btn btn-secondary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->slug])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-delete" type="submit" 
                                data-title="{{ $type->title }}">Delete</button>
                            </form>
                        </td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
