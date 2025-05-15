@extends('layouts.app')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <h2 class="mb-4">My Student Profile</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#personal-info" data-toggle="tab">Personal Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#high-school" data-toggle="tab">favourite unversities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#college" data-toggle="tab">College Academics</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="personal-info">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random">
                        <span class="font-weight-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <span class="text-black-50">{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
        
                            <!-- First Name and Last Name -->
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
        
                            <!-- Gender and Date of Birth -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ Auth::user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="{{ Auth::user()->dob }}">
                                </div>
                            </div>
        
                            <!-- Country and Education Status -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Country" value="{{ Auth::user()->country }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Education Status</label>
                                    <select name="education_status" class="form-control">
                                        <option value="school" {{ Auth::user()->education_status == 'school' ? 'selected' : '' }}>School</option>
                                        <option value="institute" {{ Auth::user()->education_status == 'institute' ? 'selected' : '' }}>Institute</option>
                                        <option value="other" {{ Auth::user()->education_status == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
        
                            <!-- Address Line 1 -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Address Line 1</label>
                                    <input type="text" class="form-control" name="address_line_1" placeholder="Enter Address Line 1" value="{{ Auth::user()->address_line_1 }}">
                                </div>
                            </div>
        
                            <!-- Save Button -->
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="high-school">
            <div class="p-3">
                <!-- High School Academics Information -->
                <h4>My favourite unversities</h4>
                <!-- Add your high school academic fields here -->
            </div>
        </div>
        {{-- <div class="tab-pane" id="college">
            <div class="p-3">
                <!-- College Academics Information -->
                <h4>College Academics</h4>
                <!-- Add your college academic fields here -->
            </div>
        </div> --}}
    </div>
</div>
@endsection

<style>
    /* Add styles similar to your previous styles for nav tabs */
    .nav-tabs .nav-link {
        font-size: 1rem;
        font-weight: 500;
        color: #333;
    }
    
    .nav-tabs .nav-link.active {
        border-bottom: 2px solid orange; /* Highlight color */
    }
    
    h4.text-right {
        font-size: 1.8rem;
        color: #003366;
        font-weight: 600;
    }
    
    /* Include other existing styles */
</style>