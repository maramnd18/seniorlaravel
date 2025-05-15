@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Favorite Universities</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($favorites as $university)
                    <tr>
                        <td>{{ $university->name }}</td>
                        <td>
                            <form action="{{ route('favorite.remove', $university->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
