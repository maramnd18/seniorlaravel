@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Create a New Faculty for: <span class="text-primary">{{ $university->UniName }}</span></h1>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('faculties.store', $university->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
                @csrf
                <div class="form-group mb-3">
                    <label for="FacultyName">Faculty Name:</label>
                    <input type="text" class="form-control" name="FacultyName" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="Description">Description:</label>
                    <textarea class="form-control" name="Description" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Save Faculty</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .form-control {
        border-radius: 0.25rem; 
    }

    .btn-primary {
        background-color: #007bff; 
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3; 
        border-color: #0056b3; 
    }
</style>
@endsection