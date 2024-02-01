@extends('layouts.admin')

@section('content')
<div>
    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">&leftarrow; Go Back</a>
</div>

<div class="container pt-4">


    <h1>New Technology</h1>
        
 

    <form action="{{ route('admin.technologies.store')}}" method="POST">
        @csrf
        
        <div class="mt-5 mb-3">
            <label for="name" class="form-label"><b>name</b></label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name')}}">
        </div>

        <div class="mt-5 mb-3">
            <label for="hex_color" class="form-label"><b>Hex Color</b></label>
            <input type="text" class="form-control" name="hex_color" id="hex_color" value="{{ old('name')}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"><b>Description</b></label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
        </div>

      
        
        <button class="btn btn-warning" type="submit">Create Project</button>
    </form>

</div> 
@endsection