@extends('layouts.app')

@section('content')




{<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">AL MAAREF University</h5>
      <p class="card-text">.</p>
      <a href="{{ route('mu_majors') }}" class="btn btn-primary">MORE INFO</a>
    </div>
  </div>


  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">AUB</h5>
      <p class="card-text">.</p>
      <a href="{{ route('aub_majors') }}" class="btn btn-primary">MORE INFO</a>
    </div>
  </div>

    @if(session('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif

    @auth
        <div class="mb-3">
            <a href="{{ route('create') }}" class="btn btn-primary">Add University</a>
        </div>
    @endauth


    @if($universities->isEmpty())
        <p>No universities found.</p>
    @else
        <div class="row1-container">
            @foreach($universities as $university)
                <div class="box {{ $loop->index % 2 == 0 ? 'cyan' : 'red' }}">
                    <h2>{{ $university->name }}</h2>
                    <p>Location: {{ $university->location ?? 'Not Available' }}</p>
                    <img src="https://via.placeholder.com/50" alt="University Icon">

                    <div class="menu-wrap">
                        <span class="btn"><a href="{{ route('show', $university->id) }}" title="View"><i class="fas fa-eye"></i></a></span>
                        <span class="btn"><a href="{{ route('edit', $university->id) }}" title="Edit"><i class="fas fa-edit"></i></a></span>
                        
                        <!-- Add to Favorites Button -->
                        <span class="btn">
                            <form action="{{ route('universities.favorite', $university->id) }}" method="POST">
                                @csrf
                                <button type="submit" title="Favorite">
                                    @if(Auth::user() && Auth::user()->favoriteUniversities->contains($university->id))
                                        <i class="fas fa-heart text-danger"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form> 
                      </span> 
                        
                        <span class="btn">
                            <form action="{{ route('destroy', $university->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

<style>
/* General Styles */
:root {
    --red: hsl(0, 78%, 62%);
    --cyan: hsl(180, 62%, 55%);
    --orange: hsl(34, 97%, 64%);
    --blue: hsl(212, 86%, 64%);
    --varyDarkBlue: hsl(234, 12%, 34%);
    --grayishBlue: hsl(229, 6%, 66%);
    --veryLightGray: hsl(0, 0%, 98%);
    --color-brand: #007bff;
    --color-dark: #333;
    --color-light: #fff;
    --rad: 8px;
    --height: 40px;
    --btn-width: 50px;
    --dur: 0.3s;
    --bez: ease-in-out;
}

body {
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    background-color: var(--veryLightGray);
}

h1 {
    font-weight: 600;
    color: var(--varyDarkBlue);
    text-align: center;
}

/* Box & Grid */
.box {
    border-radius: 5px;
    box-shadow: 0px 30px 40px -20px var(--grayishBlue);
    padding: 30px;
    margin: 20px;  
    text-align: center; 
    position: relative;
}

.box img {
    display: block;
    margin: 10px auto;
}

.cyan {
    border-top: 3px solid var(--cyan);
}
.red {
    border-top: 3px solid var(--red);
}
.orange {
    border-top: 3px solid var(--orange);
}

.row1-container, .row2-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.box {
    width: 20%;
    min-width: 200px;
}

@media (max-width: 950px) {
    .box {
        width: 45%;
    }
}

@media (max-width: 600px) {
    .box {
        width: 90%;
    }
}

/* Search Bar */
.search-container {
    display: flex;
    align-items: center;
    border: 1px solid var(--grayishBlue);
    border-radius: var(--rad);
    overflow: hidden;
    width: 300px;
}

.search-container input {
    flex: 1;
    height: var(--height);
    padding: 0 1rem;
    border: none;
    font-size: 1.2rem;
}

.search-container button {
    width: var(--btn-width);
    height: var(--height);
    background: var(--color-brand);
    color: var(--color-light);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background var(--dur) var(--bez);
}

.search-container button i {
    font-size: 1.2rem;
}

.search-container button:hover {
    background: darkblue;
}

.menu-wrap {
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
    margin-top: 10px; /* Add space between Location and buttons */
}

.menu-wrap .btn {
    background: var(--blue);
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    color: white;
    transition: 0.3s;
    text-decoration: none;
    border: none;
}

.menu-wrap .btn a {
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}

.menu-wrap .btn:hover {
    background: darkblue;
}

/* Ensure the delete button looks like the others */
.menu-wrap .btn form {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}

.menu-wrap .btn button {
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    width: 100%;
    height: 100%;
}

.menu-wrap .btn button:hover {
    color: red;
}

.menu-open:checked + .menu-open-button .close {
    display: block;
}

.menu-open:checked + .menu-open-button .btn {
    transform: translateY(-45px);
    opacity: 1;
}
</style>

<!-- Font Awesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>  





