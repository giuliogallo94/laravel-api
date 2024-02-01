@extends('layouts.admin')

@section('content')
<div>
    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">&leftarrow; Go Back</a>
</div>

<div class="container pt-4">


    <h1>Edit Project</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
        
    @endif

    <form action="{{ route('admin.projects.update', ['project' => $project->slug])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3 has-validation">
            <label for="title" class="form-label"><b>Title</b></label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title',$project->title) }}">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label"><b>Type</b></label>
            <select class="form-select" name="type_id" id="type">
                    <option value=""></option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="link" class="form-label"><b>Link</b></label>
            <input type="text" class="form-control" name="link" id="link" value="{{ old( 'link', $project->link) }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label"><b>Date</b></label>
            <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $project->date) }}">
        </div>

        <div class="mb-3">
            <label for="project_image" class="form-label"><b>Image</b></label>
            <input type="file" class="form-control" name="project_image" id="project_image">
        </div>

        <div class="mb-3">
            <img id="preview_image" src="" alt="" style="max-width: 400px">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label"><b>Description</b></label>
            <textarea class="form-control" name="descpription" id="descpription" rows="3">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="" class="form-label"><b>Technologies</b></label>
            @foreach ($technologies as $technology)
                <div class="form-check">
                    <input type="checkbox" @checked( $errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology)) id="tech-{{$technology->id}}" value="{{$technology->id}}" name="technologies[]">
                    <label for="tech-{{$technology->id}}">{{ $technology->name }}</label>    
                </div>                
            @endforeach
        </div>
        
        <button class="btn btn-warning" type="submit">Update Project</button>
    </form>

</div> 
@endsection