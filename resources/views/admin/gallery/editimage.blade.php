@extends('admin.layout') <!-- ye aapka layout file hai -->

@section('content')
<div class="container mt-4">

    <div class="card shadow-lg border-0">
        
        <!-- Header -->
        <div class="card-header bg-dark text-light">
            <h4 class="mb-0">Edit Gallery Image</h4>
        </div>

        <div class="card-body">

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

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

            <!-- FORM -->
            <form method="POST" action="{{ route('admin.gallery.update', $image->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Current Image -->
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    <img src="{{ asset('storage/services/'.$image->image) }}"
                    width="150"
                    class="rounded shadow-sm">
                </div>

                <!-- Change Image -->
                <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                    
                    <!-- Preview -->
                    <img id="preview" class="mt-2 rounded shadow-sm" width="150"/>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.gallery') }}" class="btn btn-secondary shadow-sm">Back</a>
                    <button type="submit" class="btn btn-dark shadow-sm">Update Image</button>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- Preview Script -->
<script>
function previewImage(event){
    document.getElementById('preview').src = URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection