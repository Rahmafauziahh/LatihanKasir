<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #f1f8fc;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            text-align: center;
            color: #247ad1;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold; /* Menambahkan font-weight bold */
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
            padding: 12px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert ul {
            padding-left: 20px;
        }

        .alert li {
            font-size: 1rem;
        }

        .form-label {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="container py-5 d-flex justify-content-center">
        <div class="login-container">
            <h1>Login</h1>
            
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="footer-text">
                <small>Belum punya akun? <a href="/register">Daftar disini</a></small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-oBqDVmMz4fnFO9gybK5sbs2c0N5gnzG5EXiXJHfXStNq8pF3XboZg5dZoe+Y9vZj5" crossorigin="anonymous"></script>
</body>

</html>
