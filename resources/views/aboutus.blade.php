<!-- resources/views/about.blade.php -->
@extends('welcome')

@section('title', 'About Us')

@section('hero-image', 'https://images.unsplash.com/photo-1521791136064-7986c2920216')

@section('hero')
<h1 class="display-4 fw-bold">About Our Company</h1>
<p class="lead">Learn more about who we are and what we do</p>
@endsection

@section('content')

<div class="row align-items-center mb-5">
    <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216" class="img-fluid rounded shadow" alt="About Us">
    </div>
    <div class="col-md-6">
        <h2>Our Mission</h2>
        <p>
            At <strong>MySite</strong>, our mission is to empower businesses with modern, responsive, and user-friendly websites. 
            We focus on delivering high-quality solutions that help our clients grow their online presence and reach their target audience effectively.
        </p>
        <h3>Our Vision</h3>
        <p>
            We envision being a trusted partner for small and medium businesses globally, providing innovative digital solutions that drive success.
        </p>
    </div>
</div>

<div class="row text-center mt-5">
    <div class="col-md-4 mb-4">
        <div class="p-4 bg-light shadow rounded">
            <h4>Experienced Team</h4>
            <p>Our team has years of experience in web design, development, and digital marketing.</p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="p-4 bg-light shadow rounded">
            <h4>Customer Focused</h4>
            <p>We prioritize our clients’ needs and ensure their satisfaction at every step of the project.</p>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="p-4 bg-light shadow rounded">
            <h4>Affordable Pricing</h4>
            <p>We offer professional services at competitive and transparent pricing.</p>
        </div>
    </div>
</div>

@endsection