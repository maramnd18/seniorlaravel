@extends('layouts.app')

@section('content')
<div class="container-fluid hero-header">  <!-- Use container-fluid only here -->
    <div class="row align-items-center">
        <div class="col-lg-6 text-left">
            <h1 class="display-4 mb-3 hero-heading">Your <span>Success</span> Journey Starts With Us!</h1>
            <p class="hero-paragraph">
                Exploring options for higher education, looking for specific programs, or just curious about the different campuses, we are here to make your journey easier.
            </p>
            <a href="{{ route('home') }}" class="btn btn-primary hero-btn">Explore More</a>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('img/image1.png') }}" alt="Success Journey" class="hero-image">
        </div>
    </div>
</div>
@endsection

<style>
.hero-header {
    background-color: var(--primary-color);
    align-items: center;
    justify-content: center;
}

.align-items-center {
    padding-left: 5%;
}

.text-left {
    margin-bottom: 10%;
}

.hero-heading {
    font-size: 3rem;
    font-weight: bold;
    color: var(--text-color);
}

.hero-heading span {
    color: var(--accent-color);
}

.hero-paragraph {
    font-size: 1.2rem;
    color: var(--text-color);
    max-width: 500px;
}

.hero-btn {
    font-size: 1.2rem;
    padding: 10px 20px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

.hero-btn:hover {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
}

.container-fluid {
    width: 100% !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}

@keyframes moveSideToSide {
    0% { transform: translateX(0); }
    50% { transform: translateX(20px); }
    100% { transform: translateX(0); }
}

.hero-image {
    max-width: 100%;
    height: auto;
    animation: moveSideToSide 3s ease-in-out infinite;
}

.hero-image:hover {
    animation-play-state: paused;
}
</style>
