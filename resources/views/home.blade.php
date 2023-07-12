@extends('layouts.main-layout')

@section('pageName')
    Home
@endsection

@section('content')
    <main class="bg-secondary py-5">

        <div class="container text-center text-warning">
            <h1>I Film del mio database</h1>
            <div class="container d-flex justify-content-center flex-wrap gap-3 my-5">
                {{-- cicle movies --}}
                @foreach ($movies as $movie)
                    <div class="card text-bg-warning" style="width: 18rem;">
                        <div class="card-header">
                            {{ $movie->title }}
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">TITOLO ORIGINALE: <br> {{ $movie->original_title }}</li>
                            <li class="list-group-item">NAZIONALITA': <br> {{ $movie->nationality }}</li>
                            <li class="list-group-item">DATA DI USCITA: <br> {{ $movie->date }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
