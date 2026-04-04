@extends('admin.layout')

@section('content')

<h2 class="mb-4">Admin Dashboard</h2>

<div class="row">

   <div class="row">

    <!-- Services -->
    <div class="col-md-4">
        <div class="card-box p-4 rounded text-center bg-light shadow-sm border">
            <h3 class="text-primary">Services</h3>
            <p class="text-muted">Manage all services</p>
            <a href="{{ route('admin.service.index') }}" 
               class="btn btn-outline-primary btn-sm">View</a>
        </div>
    </div>

    <!-- Gallery -->
    <div class="col-md-4">
        <div class="card-box p-4 rounded text-center bg-light shadow-sm border">
            <h3 class="text-success">Gallery</h3>
            <p class="text-muted">Manage images</p>
            <a href="{{ route('admin.gallery') }}" 
               class="btn btn-outline-success btn-sm">View</a>
        </div>
    </div>

    <!-- Contacts -->
    <div class="col-md-4">
        <div class="card-box p-4 rounded text-center bg-light shadow-sm border">
            <h3 class="text-warning">Contacts</h3>
            <p class="text-muted">User messages</p>
            <a href="/admin/contacts" 
               class="btn btn-outline-warning btn-sm">View</a>
        </div>
    </div>

</div>



@endsection