<!-- resources/views/services.blade.php -->
@extends('welcome')

@section('title', 'Our Services')

@section('hero')
<h1 class="display-4 fw-bold">Our Services</h1>
<p class="lead">Explore the professional services we offer to boost your business</p>
@endsection

@section('content')
<div class="container mt-5">

    <!-- Static Explanatory Paragraph -->
    <p class="text-center mb-5 text-muted" style="max-width:800px; margin:auto; line-height:1.6;">
        Our Services page showcases all the services offered by your company in a modern, visually appealing, and user-friendly layout. Each service is displayed as a card with a high-quality image and a brief overlay description, allowing users to quickly understand what the service entails. The cards are fully responsive, adjusting seamlessly across desktops, tablets, and mobile devices, ensuring a consistent experience for every visitor. 
    </p>

    <div class="row">
        @forelse($services as $service)
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="service-card shadow-sm">

                <!-- Image -->
                <img src="{{ asset('storage/services/'.$service->image) }}" alt="{{ $service->title }}">

                <!-- Overlay -->
                <div class="overlay">
                    <h5>{{ $service->title }}</h5>
                    <p>{{ Str::limit($service->description, 100) }}</p>
                </div>

            </div>

        </div>
        @empty
            <p class="text-center text-muted">No services available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Service Card Styling */
    .service-card {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }

    .service-card img {
        width: 100%;
        height: 230px;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .service-card:hover img {
        transform: scale(1.1);
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .overlay {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 15px;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        color: #fff;
        transition: background 0.4s;
    }

    .overlay h5 {
        margin: 0;
        font-weight: 600;
        font-size: 18px;
    }

    .overlay p {
        margin: 5px 0 0;
        font-size: 14px;
        line-height: 1.4;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .service-card img {
            height: 200px;
        }
        .overlay h5 {
            font-size: 16px;
        }
        .overlay p {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .service-card img {
            height: 180px;
        }
    }
</style>
@endpush