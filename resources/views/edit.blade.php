@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6 bg-light p-4 rounded shadow-sm">
        <h1 class="text-center mb-4 text-primary">Edit University</h1>

        <form action="{{ route('universities.update', $university->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="UniName" class="form-label font-weight-bold">University Name</label>
                <input type="text" class="form-control" id="UniName" name="UniName" value="{{ $university->UniName }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="Description" class="form-label font-weight-bold">Description</label>
                <textarea class="form-control" id="Description" name="Description" required>{{ $university->Description }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">Update University</button>
            </div>
        </form>
    </div>
</div>
@endsection
