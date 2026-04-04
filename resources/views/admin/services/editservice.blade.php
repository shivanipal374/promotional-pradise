@extends('admin.layout')
@section('content')
<div class="container mt-4">
   <div class="card shadow-lg border-0">
      <!-- Header -->
      <div class="card-header bg-dark text-light">
         <h4 class="mb-0">Edit Service</h4>
      </div>
      <div class="card-body">
         <!-- Validation Errors -->
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul class="mb-0">
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form method="POST" action="/admin/service/update/{{ $service->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Update method -->
            <!-- Title -->
            <div class="mb-3">
               <label class="form-label">Service Title</label>
               <input type="text" name="title" class="form-control" 
                  value="{{ $service->title }}">
            </div>
            <!-- Description -->
            <div class="mb-3">
               <label class="form-label">Description</label>
               <textarea name="description" class="form-control" rows="4">{{ $service->description }}</textarea>
            </div>
            <!-- Current Image -->
            <div class="mb-3">
               <label class="form-label">Current Image</label><br>
               <img src="{{ $service->image ? asset('storage/services/'.$service->image) : asset('assets/img/default-service.webp') }}"
                  width="150"
                  class="rounded shadow-sm">
            </div>
            <!-- New Image Upload -->
            <div class="mb-3">
               <label class="form-label">Change Image</label>
               <input type="file" name="image" class="form-control" onchange="previewImage(event)">
               <!-- Preview -->
               <img id="preview" class="mt-2 rounded shadow-sm" width="150"/>
            </div>
            <!-- Buttons -->
            <div class="d-flex justify-content-between">
               <a href="/admin/service" class="btn btn-secondary shadow-sm">Back</a>
               <button type="submit" class="btn btn-dark shadow-sm">Update Service</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Image Preview Script -->
<script>
   function previewImage(event){
       document.getElementById('preview').src = URL.createObjectURL(event.target.files[0]);
   }
</script>
@endsection