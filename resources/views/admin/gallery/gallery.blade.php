@extends('admin.layout')
@section('content')
<div class="container mt-3">
   @if(session('success'))
   <div class="alert alert-success alert-dismissible fade show">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   </div>
   @endif
   <!-- Header -->
   <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold">All Images</h3>
      <a href="{{ route('gallery.create') }}" class="btn btn-primary shadow-sm">
      + Upload Image
      </a>
   </div>
   <!-- Card -->
   <div class="card shadow-sm border-0">
      <div class="card-body p-0">
         <table class="table table-hover align-middle mb-0 text-center">
            <!-- Table Head -->
            <thead class="table-light">
               <tr>
                  <th>Id</th>
                  <th class="text-start">Image</th>
                  <th>Preview</th>
                  <th class="text-end pe-4">Action</th>
               </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
               @forelse($images as $key => $image)
               <tr>
                  <td>{{ $key+1 }}</td>
                  <td class="text-start fw-semibold">
                     {{ $image->image }}
                  </td>
                  <td>
                     <img src="{{ asset('storage/services/'.$image->image) }}"
                        width="70" height="70">
                  </td>
                  <!-- ACTION -->
                  <td class="text-end pe-4">
                     <a href="{{ route('admin.gallery.edit', $image->id) }}"
                        class="btn btn-sm btn-outline-primary">
                     Edit
                     </a>
                     <form action="{{ route('admin.delete', $image->id) }}"
                        method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('Delete this image?')">
                        Delete
                        </button>
                     </form>
                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="4" class="py-4 text-muted">
                     No images found
                  </td>
               </tr>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection