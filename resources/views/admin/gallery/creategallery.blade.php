@extends('admin.layout')
@section('content')
<div class="container mt-4">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card shadow border-0" style="border-radius: 15px;">
            <!-- Header -->
            <div class="card-header text-white text-center"
               style="background: #000; border-bottom: 1px solid #ddd;">
               <h5 class="mb-0">📸 Upload New Image</h5>
               <style>
                  .black-btn {
                  background: #000;
                  color: #fff;
                  }
                  .black-btn:hover {
                  background: #333;
                  color: #fff;
                  }
               </style>
            </div>
            <div class="card-body p-4">
               <!-- Errors -->
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
               <form method="POST" action="/admin/gallery" enctype="multipart/form-data">
                  @csrf
                  <!-- Upload Box -->
                  <div class="mb-4 text-center">
                     <label class="form-label fw-semibold">Select Image</label>
                     <div class="border rounded p-4"
                        style="border-style: dashed; cursor:pointer;"
                        onclick="document.getElementById('imageInput').click()">
                        <p class="text-muted mb-2">Click to upload</p>
                        <small class="text-muted">PNG, JPG, WEBP</small>
                        <input type="file" name="image" id="imageInput"
                           class="form-control d-none"
                           onchange="previewImage(event)">
                     </div>
                     <!-- Preview -->
                     <img id="preview"
                        class="mt-3 rounded shadow-sm"
                        style="max-width: 150px; display:none;">
                  </div>
                  <!-- Buttons -->
                  <div class="d-flex justify-content-between mt-4">
                     <a href="{{ route('admin.gallery') }}"
                        class="btn btn-outline-secondary px-4">
                     ← Back
                     </a>
                     <button type="submit"
                        class="btn black-btn px-4 shadow-sm">
                     Upload
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Preview Script -->
<script>
   function previewImage(event){
       let preview = document.getElementById('preview');
       preview.src = URL.createObjectURL(event.target.files[0]);
       preview.style.display = 'block';
   }
</script>
@endsection