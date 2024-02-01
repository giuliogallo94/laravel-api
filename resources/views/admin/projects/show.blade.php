@extends('layouts.admin')

@section('content')
<div class="buttons d-flex justify-content-between p-3 ">
   <a href="{{ route('admin.projects.index')}}" class="btn btn-primary">&LeftArrow; Go Portfolio</a>
   <a href="{{ route('admin.projects.edit', ['project' => $project->slug])}}" class="btn btn-secondary">Edit</a>
   <form action="{{ route('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger btn-delete" type="submit" 
      data-title="{{ $project->title }}">Delete</button>
   </form>
</div>

<div class="pt-5">
   <h2 class="text-center">{{ $project->title }}</h2>

   <p>
      Category: {{ $project->type ? $project->type->name : 'None' }}
   </p>

   <div class="my-3">
      Technologies:
      @foreach ($project->technologies as $technology)
          <span class="badge" style="background-color: {{ $technology->hex_color }}">{{ $technology->name }}</span>
      @endforeach
  </div>

   <div class="preview text-center mt-4">
        <img src="{{ asset('storage/' . $project->project_image) }}" style="max-width: 550px" alt="">
   </div>
   <div class="description mt-3">
    {{$project->description}}
   </div>
   <div class="date mt-4 text-end">
    {{$project->date}}
   </div>
</div>
@endsection