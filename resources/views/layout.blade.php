<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Connect Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #f9f9f9;
        }
        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .btn-consultation {
            background-color: #fff;
            border: 2px solid #ddd;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .hero-section {
            text-align: left;
            padding: 50px;
            background: linear-gradient(to right, #f5f5f5, #fff);
        }
        .hero-section h1 {
            font-size: 2.5rem;
            color: #333;
        }
        .hero-section h1 span {
            color: red;
        }
        .hero-section p {
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <body>
        @yield('content')
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/page">Uni Connect Center</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Log in</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    