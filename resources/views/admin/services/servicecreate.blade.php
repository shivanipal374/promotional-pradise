@extends('admin.layout')
@section('content')
<div class="container mt-4">
   <div class="card shadow-lg border-0">
      <div class="card-header bg-dark text-light">
         <h4 class="mb-0">+ Add New Service</h4>
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
         <form method="POST" action="/admin/service" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div class="mb-3">
               <label class="form-label">Service Title</label>
               <input type="text" name="title" class="form-control" placeholder="Enter service title" value="{{ old('title') }}">
            </div>
            <!-- Description -->
            <div class="mb-3">
               <label class="form-label">Description</label>
               <textarea name="description" class="form-control" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
            </div>
            <!-- Image Upload -->
            <div class="mb-3">
               <label class="form-label">Upload Image</label>
               <input type="file" name="image" class="form-control">
            </div>
            <!-- Buttons -->
            <div class="d-flex justify-content-between">
               <a href="/admin/service" class="btn btn-secondary shadow-sm">Back</a>
               <button type="submit" class="btn btn-dark shadow-sm">Save Service</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection