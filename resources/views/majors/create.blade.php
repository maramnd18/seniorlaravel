@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Create Major for Faculty: <span class="text-primary">{{ $faculty->FacultyName }}</span></h1>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('majors.store', $faculty->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
                @csrf
                <div class="form-group mb-3">
                    <label for="MajorName">Major Name</label>
                    <input type="text" name="MajorName" class="form-control" id="MajorName" required>
                </div>
                <div class="form-group mb-3">
                    <label for="Description">Description</label>
                    <textarea name="Description" class="form-control" id="Description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Save Major</button>
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