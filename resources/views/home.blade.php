@extends('layouts.main-layout')

@section('pageName')
    Home
@endsection

@section('content')
    <main class="bg-secondary py-5">

        <div class="container text-center text-warning">
            <h1>I Film del mio database</h1>

            {{-- aggiungi film --}}

            <form action="{{ route('add.movie') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <label for="original_title" class="form-label">original title</label>
                    <input type="text" class="form-control" id="original_title" name="original_title" required>
                    <label for="nationality" class="form-label">nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" required>
                    <label for="date" class="form-label">date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                    <label for="vote" class="form-label">vote</label>
                    <input type="number" max="10" min="0" class="form-control" id="vote" name="vote"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>

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
                            <li class="list-group-item">VOTO: <br> {{ $movie->vote }}</li>
                        </ul>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
