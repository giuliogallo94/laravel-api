@extends('layouts.admin')

@section('content')
<div class="m-4">

    <h1>Technologies</h1>
    <div class="button text-end">
        <a href="{{ route('admin.technologies.create')}}" class="btn btn-primary">+ Technology</a>
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
                @foreach ($technologies as $technology)
                <tr>
                    <th scope="row">{{ $technology->id }}</th>
                    <td>{{ $technology->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
