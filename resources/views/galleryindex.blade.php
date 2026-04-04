<!-- resources/views/gallery.blade.php -->
@extends('welcome')
@section('title', 'Gallery')
@section('hero')
<h1 class="display-4 fw-bold">Gallery</h1>
<p class="lead">Explore our photo gallery showcasing our work and projects</p>
@endsection
@section('content')
<div class="container mt-5">
   <!-- Explanatory Paragraph -->
   <p class="text-center mb-5 text-muted" style="max-width:800px; margin:auto; line-height:1.6;">
      Our gallery showcases the portfolio of our completed projects, highlights of events, and samples of the work we’ve delivered to our clients. Each image is displayed as a card with subtle hover effects, allowing users to interact with the content smoothly. The gallery layout is fully responsive, automatically adjusting to screen sizes to give a consistent, visually appealing experience on desktop, tablet, and mobile. Admin can upload unlimited images, and the layout adapts without any extra coding. This gallery helps visitors quickly visualize the quality and style of our services.
   </p>
   <div class="row">
      @forelse($images as $image)
      <div class="col-lg-4 col-md-6 mb-4">
         <div class="gallery-card shadow-sm">
            <!-- Image -->
            <img src="{{ asset('storage/services/'.$image->image) }}" alt="Gallery Image">
            <!-- Overlay (optional) -->
            <div class="overlay">
               <p class="mb-0">{{ Str::limit($image->title ?? 'Project Image', 50) }}</p>
            </div>
         </div>
      </div>
      @empty
      <p class="text-center text-muted">No images in the gallery at the moment.</p>
      @endforelse
   </div>
</div>
@endsection
@push('styles')
<style>
   .gallery-card {
   position: relative;
   overflow: hidden;
   border-radius: 12px;
   transition: transform 0.3s, box-shadow 0.3s;
   cursor: pointer;
   }
   .gallery-card img {
   width: 100%;
   height: 230px;
   object-fit: cover;
   transition: transform 0.4s;
   }
   .gallery-card:hover img {
   transform: scale(1.1);
   }
   .gallery-card:hover {
   transform: translateY(-5px);
   box-shadow: 0 10px 20px rgba(0,0,0,0.15);
   }
   .overlay {
   position: absolute;
   bottom: 0;
   width: 100%;
   padding: 10px;
   background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
   color: #fff;
   font-size: 14px;
   }
   /* Responsive adjustments */
   @media (max-width: 768px) {
   .gallery-card img {
   height: 200px;
   }
   }
   @media (max-width: 576px) {
   .gallery-card img {
   height: 180px;
   }
   }
</style>
@endpush