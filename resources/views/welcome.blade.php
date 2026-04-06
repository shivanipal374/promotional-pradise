<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
   <head>
      <title>@yield('title', 'My Website')</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
         body {
         font-family: 'Segoe UI', sans-serif;
         background-color: #f5f7fb;
         }
         /* Navbar hover */
         .navbar-nav .nav-link:hover {
         color: #ffc107 !important;
         }
         /* Hero section */
         .hero {
         background: url('@yield('hero-image', "https://images.unsplash.com/photo-1498050108023-c5249f4df085")') no-repeat center center/cover;
         height: 90vh;
         color: white;
         display: flex;
         align-items: center;
         }
         .hero-overlay {
         background: rgba(0,0,0,0.6);
         width: 100%;
         height: 100%;
         display: flex;
         align-items: center;
         }
         .section {
         padding: 60px 0;
         }
         .card:hover {
         transform: scale(1.05);
         transition: 0.3s;
         }
         /* Footer */
         footer {
         background: #212529;
         color: white;
         padding: 40px 20px;
         }
         footer a {
         color: #ffc107;
         text-decoration: none;
         }
         footer a:hover {
         text-decoration: underline;
         }
         .social-icons a {
         display: inline-block;
         margin: 0 10px;
         color: white;
         font-size: 18px;
         transition: 0.3s;
         }
         .social-icons a:hover {
         color: #ffc107;
         }
         .features li {
         margin-bottom: 8px;
         }
      </style>
      @stack('styles')
   </head>
   <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container">
            <a class="navbar-brand" href="/">MySite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                  <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About Us</a>
                     About Us</a>
                  </li>
                  <li class="nav-item"><a href="{{ route('service') }}" class="nav-link">Services</a></li>
                  <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link">Gallery</a></li>
                  <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- Hero Section -->
      @hasSection('hero')
      <section class="hero">
         <div class="hero-overlay">
            <div class="container text-center text-white">
               @yield('hero')
            </div>
         </div>
      </section>
      @endif
      <!-- Page Content -->
      <div class="container mt-5">
         @yield('content')
      </div>
      <!-- Features Section -->
      <section class="section bg-light text-center">
         <div class="container">
            <h2 class="mb-4">Why Choose Us</h2>
            <div class="row">
               <div class="col-md-3 mb-3">
                  <div class="p-3 bg-white shadow-sm rounded">
                     ✔ Experienced Team
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                  <div class="p-3 bg-white shadow-sm rounded">
                     ✔ Affordable Pricing
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                  <div class="p-3 bg-white shadow-sm rounded">
                     ✔ Fast Delivery
                  </div>
               </div>
               <div class="col-md-3 mb-3">
                  <div class="p-3 bg-white shadow-sm rounded">
                     ✔ 100% Satisfaction
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Footer -->
      <footer>
         <div class="container">
            <div class="row">
               <!-- About -->
               <div class="col-md-4 mb-3">
                  <h5>About MySite</h5>
                  <p>We provide professional web solutions to help businesses grow online. Our team focuses on delivering modern and responsive websites that meet your needs.</p>
               </div>
               <!-- Contact -->
               <div class="col-md-4 mb-3">
                  <h5>Contact Info</h5>
                  <p>Email: <a href="mailto:info@mysite.com">info@mysite.com</a></p>
                  <p>Phone: <a href="tel:+911234567890">+91 12345 67890</a></p>
                  <p>Address: 123, Business Street, Delhi, India</p>
               </div>
               <!-- Quick Links / Social -->
               <div class="col-md-4 mb-3">
                  <h5>Follow Us</h5>
                  <div class="social-icons">
                     <a href="#" target="_blank"><i class="bi bi-facebook"></i> Facebook</a><br>
                     <a href="#" target="_blank"><i class="bi bi-twitter"></i> Twitter</a><br>
                     <a href="#" target="_blank"><i class="bi bi-instagram"></i> Instagram</a><br>
                     <a href="#" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a>
                  </div>
               </div>
            </div>
            <div class="text-center mt-3">
               <small>© 2026 My Website | All Rights Reserved</small>
            </div>
         </div>
      </footer>
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      @stack('scripts')
   </body>
</html>