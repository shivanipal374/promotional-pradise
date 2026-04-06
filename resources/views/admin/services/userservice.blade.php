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
      <h3 class="fw-bold">All Services</h3>
      <a href="{{ route('create.service') }}" class="btn btn-primary shadow-sm">
      + Add New Service
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
                  <th class="text-start">Title</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th class="text-end pe-4">Action</th>
               </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
               @forelse($services as $key => $service)
               <tr>
                  <td>{{ $key+1 }}</td>
                  <td class="text-start fw-semibold">
                     {{ $service->title }}
                  </td>
                  <td>
                     <img src="{{ asset('storage/services/'.$service->image) }}"
                        width="70" height="70">
                  </td>
                  <!-- STATUS -->
                  <td>
                     <form action="{{ route('admin.service.status', $service->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                           class="badge border-0 {{ $service->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $service->status ? 'Active' : 'Inactive' }}
                        </button>
                     </form>
                  </td>
                  <!-- ACTION -->
                  <td class="text-end pe-4">
                     <a href="{{ route('admin.service.edit', $service->id) }}"
                        class="btn btn-sm btn-outline-primary">
                     Edit
                     </a>
                     <form action="{{ route('admin.service.delete', $service->id) }}"
                        method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('Delete this service?')">
                        Delete
                        </button>
                     </form>
                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="5" class="py-4 text-muted">
                     No services found
                  </td>
               </tr>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection