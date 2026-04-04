<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: lightblue;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
        }

        .login-box h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 8px;
        }

        ::placeholder {
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h3>Admin Login</h3>

    <!-- Success / Error Messages -->
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="/admin/login">
        @csrf

        <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email">
        <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password">

        <button class="btn btn-primary">Login</button>
    </form>

</div>

</body>
</html>