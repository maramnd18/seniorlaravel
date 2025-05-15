@extends('layouts.app')

@section('content')

<div class="wrapper" style="background-image: url('{{ asset('img/image8.png') }}');position: relative;background-size: cover; background-position: center; height: 650px;">
    <div class="inner">
        <!-- Image on the left -->
        <div class="image-holder">
            <img src="{{ asset('img/image6.png') }}" alt="Illustration">
        </div>

        <!-- Registration Form on the right -->
        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>Registration Form</h3>
            
                <div class="form-group">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-wrapper">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-wrapper">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-wrapper">
                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="" disabled selected>Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-wrapper">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-wrapper">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Hidden field to set the role -->
                <input type="hidden" name="role" value="user"> <!-- Default role is 'user' -->
            
                <button type="submit">
                    Register
                </button>
            </form>
            
        </div>
    </div>
</div>
@endsection
