@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6 bg-light p-4 rounded shadow-sm">
        <h1 class="text-center mb-4 text-primary">Add University</h1>

        <form action="{{ route('store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="name" class="form-label font-weight-bold">University Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group mb-3">
                <label for="founded_year" class="form-label font-weight-bold">Founded Year</label>
                <input type="date" class="form-control" name="founded_year" id="founded_year" required>
            </div>

            <div class="form-group mb-3">
                <label for="website" class="form-label font-weight-bold">Website</label>
                <input type="text" class="form-control" name="website" id="website" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">Add University</button>
            </div>
        </form>
    </div>
</div>
@endsection
