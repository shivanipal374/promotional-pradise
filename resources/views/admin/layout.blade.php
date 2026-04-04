<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background: #ffffff;
            position: fixed;
            width: 230px;
            border-right: 1px solid #e5e7eb;
            padding: 20px 10px;
        }

        .sidebar h4 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: #555;
            padding: 10px 15px;
            margin: 6px 0;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #eef2ff;
            color: #4f46e5;
        }

        /* Active link (optional) */
        .sidebar a.active {
            background: #4f46e5;
            color: #fff;
        }

        /* Content */
        .content {
            margin-left: 230px;
            padding: 25px;
        }
.logout-btn {
    background: #000;
    color: #fff;
    border: none;
}


.logout-btn:hover {
    background: #fbf9f9;
}
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column justify-content-between">

    <div>
        <h4 class="text-dark px-2">Admin Panel</h4>

        <a href="/admin/dashboard">Dashboard</a>
        <a href="{{ route('admin.service.index') }}">Services</a>
        <a href="{{ route('admin.gallery') }}">Gallery</a>
        <a href="/admin/contacts">Contacts</a>
    </div>

    <!-- Logout -->
    <a href="/admin/logout"
   class="btn logout-btn w-100"
   onclick="return confirm('Logout?')">
    Logout
</a>

</div>

<!-- Content -->
<div class="content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>