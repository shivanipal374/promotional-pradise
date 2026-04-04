<!-- resources/views/welcome.blade.php -->
@extends('welcome')

@section('title', 'Home')

@section('hero')
<div class="hero" style="background: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085') no-repeat center center/cover; height: 70vh; position: relative;">
    <div class="hero-overlay" style="background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; height: 100%;">
        <!-- Contact Form Overlay -->
        <div class="card p-4 shadow-lg" style="max-width: 450px; width: 100%; background: rgba(255,255,255,0.95); border-radius: 12px;">
            <h3 class="text-center mb-3">Contact Us</h3>

            @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/contact">
                @csrf
                <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
                <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                <input type="text" name="phone" class="form-control mb-2" placeholder="Phone">
                <textarea name="message" class="form-control mb-2" placeholder="Your message" rows="3" required></textarea>
                <button class="btn btn-primary w-100">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Why Choose Us -->
<section class="section bg-light text-center mt-5">
    <div class="container">
        <h2>Why Choose Us</h2>
        <div class="row mt-4">
            <div class="col-md-3">✔ Experienced Team</div>
            <div class="col-md-3">✔ Affordable Pricing</div>
            <div class="col-md-3">✔ Fast Delivery</div>
            <div class="col-md-3">✔ 100% Satisfaction</div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>100+</h2>
                <p>Projects Completed</p>
            </div>
            <div class="col-md-4">
                <h2>50+</h2>
                <p>Happy Clients</p>
            </div>
            <div class="col-md-4">
                <h2>5+</h2>
                <p>Years Experience</p>
            </div>
        </div>
    </div>
</section>
@endsection