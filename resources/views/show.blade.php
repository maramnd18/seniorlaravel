@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary font-weight-bold">{{ $university->UniName }}</h1>
        <p class="lead text-muted">{{ $university->Description }}</p>
    </div>

    <h2 class="text-center text-dark mt-4 mb-3 font-weight-bold">Faculties</h2>

    @if($university->faculties->isEmpty())
        <div class="alert alert-warning text-center font-weight-bold">
            No faculties available for this university.
        </div>
    @else
        <div class="row justify-content-center row-cols-1 row-cols-md-3 g-4">
            @foreach($university->faculties as $faculty)
                <div class="col mb-5">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title text-primary font-weight-bold">{{ $faculty->FacultyName }}</h5>
                            <p class="card-text text-muted">{{ $faculty->Description }}</p>

                            <h6 class="mt-3 text-secondary font-weight-bold">Majors</h6>
                            @if($faculty->majors->isEmpty())
                                <p class="text-warning font-weight-bold">No majors available for this faculty.</p>
                            @else
                                <ul class="list-group list-group-flush">
                                    @foreach($faculty->majors as $major)
                                        <li class="list-group-item text-dark">{{ $major->MajorName }}: <small>{{ $major->Description }}</small></li>
                                    @endforeach
                                </ul>
                            @endif
                            @auth
                            <a href="{{ route('majors.create', $faculty->id) }}" class="btn btn-outline-primary mt-3 font-weight-bold">Add New Major</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        @auth
        <a href="{{ route('faculties.create', $university->id) }}" class="btn btn-success mx-2 px-4 py-2 rounded-pill font-weight-bold">Add New Faculty</a>
        @endauth
        <a href="{{ route('home') }}" class="btn btn-outline-secondary mx-2 px-4 py-2 rounded-pill font-weight-bold">Back to Universities</a>
    </div>
</div>

@endsection

<style>
    .container {
    max-width: 1200px;
}
    .card {
        transition: all 0.3s ease;
        width: 300px;
        
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }

    .font-weight-bold {
        font-weight: 600;
    }

    .row.justify-content-center {
        display: flex;
        justify-content: center;
    }

    .container {
        padding: 30px;
    }
</style>

 --}}

{{-- 

