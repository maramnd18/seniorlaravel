@extends('layouts.app')

@section('content')
    <div class="aboutus-hero" style="position: relative; background-image: url('{{ asset('img/image2.png') }}'); background-size: cover; background-position: center; height: 650px;">
        <div class="container text-right" style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%); color: white;">
            <h1 class="aboutus-title"><strong>About Us</strong></h1>
            <h3 class="aboutus-subtitle">Welcome to UniConnectCenter</h3>
            <p class="aboutus-description">
                Our website is dedicated to providing students and parents with comprehensive information about universities across Lebanon.
                Whether you're exploring options for higher education, looking for specific programs, or just curious about the different campuses,
                we are here to make your journey easier.
            </p>
        </div>
    </div>

    <div class="aboutus-content" style="position: relative; background-image: url('{{ asset('img/image3.png') }}'); background-position: right center; background-repeat: no-repeat; display: flex; justify-content: space-between; align-items: center; height: 500px;">
        <div class="container"">
            <h4 style="padding-left: 0.5%;">What We Offer:</h4>
            <ul class="aboutus-list">
                <li>Detailed profiles of universities in Lebanon</li>
                <li>Information on programs, majors, and courses offered</li>
                <li>Insights into campus locations, facilities, and contact details</li>
                <li>Regular updates and accurate data to help you make informed decisions</li>
            </ul>
        </div>
    </div>

    <div class="aboutus-footer text-center">
       <p>
            Thank you for visiting our website. We hope it serves as a valuable tool for your educational journey!
        </p>
    </div>
@endsection
 
<style>
.aboutus-hero {
    position: relative;
    height: 500px;
    color: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 20px;
}

.aboutus-hero .container {
    text-align: right;
    color: white;
    max-width: 50%;
}

.aboutus-title {
    font-size: 3rem;
    font-weight: bold;
    color: var(--dark-color);
    padding-right: 15%;
}

.aboutus-subtitle {
    font-size: 1.5rem;
    color: var(--secondary-color);
    padding-right: 11%;
}

.aboutus-description {
    font-size: 1.2rem;
    color: var(--text-color);
    padding-left: 50%;
    text-align: center;
}

.aboutus-content {
    padding: 60px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: right center;
}

.aboutus-list {
    list-style-type: none;
    padding-right: 1%;
    font-size: 1.1rem;
    text-align: left;
    max-width: 600px;
}

.aboutus-list li {
    padding: 10px 0;
    color: var(--text-color);
}

.aboutus-list li::before {
    content: "\2022";
    color: var(--accent-color);
    font-weight: bold;
    padding-right: 10px;
}

.aboutus-footer {
    background-color: var(--primary-color);
    padding: 30px 0;
    color: var(--dark-color);
}

.aboutus-footer p {
    font-size: 1.1rem;
    color: var(--dark-color);
}
</style>