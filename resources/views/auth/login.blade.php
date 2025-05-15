@extends('layouts.app')

@section('content')
    <div class="wrapper" style="background-image: url('{{ asset('img/image8.png') }}'); position: relative; background-size: cover; background-position: center; height: 650px;">
        <div class="inner">
            <!-- Image holder (left side) -->
            <div class="image-holder">
                <img src="{{ asset('img/image6.png') }}" alt="Illustration">
            </div>

            <!-- Login Form (right side) -->
            <div class="form-container">
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h3>Login</h3>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-wrapper">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-wrapper">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <button type="submit">
                        Log in
                    </button>

                    <!-- Register Link (Always Visible) -->
                    <div class="text-center mt-3">
                        <p class="text-sm text-gray-700">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition duration-300">
                                Register here
                            </a>
                        </p>
                    </div>

                    <!-- Forgot Password (Shows only when login fails) -->
                    @if ($errors->has('email') || $errors->has('password'))
                        <div class="text-center mt-2">
                            <a class="text-sm text-red-600 hover:text-red-800 transition duration-300" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .wrapper::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        filter: blur(10px);
        z-index: -1; 
    }

    .inner {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        width: 800px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .image-holder {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-holder img {
        max-width: 100%;
        height: auto;
    }

    .form-container {
        flex: 1;
        padding: 20px;
    }

    .form-container h3 {
        font-size: 1.8rem;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 12px;
        font-size: 1rem;
        margin-bottom: 15px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.5);
    }

    .is-invalid {
        border-color: red;
    }

    .invalid-feedback {
        font-size: 0.9rem;
        color: red;
        margin-top: 5px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border-radius: 8px;
        padding: 12px;
        font-size: 1.1rem;
        width: 100%;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
    }

    .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ms-2 {
        margin-left: 0.5rem;
    }

    a {
        text-decoration: none;
        color: #4b5563;
        font-size: 0.875rem;
    }

    a:hover {
        color: #6366f1;
    }

    @media (max-width: 768px) {
        .inner {
            flex-direction: column;
            width: 90%;
        }

        .image-holder {
            display: none;
        }
    }
</style>
