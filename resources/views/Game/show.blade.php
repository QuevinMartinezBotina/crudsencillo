@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12  d-flex justify-content-center my-5 ">
            <form method="POST" action="{{ route('Game.update', ['Game' => $game->id]) }}"
                class="shadow-lg p-3 rounded bg-form ">
                @method('PATCH')
                @csrf
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @error('titulo')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                @error('precio')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título del juego</label>
                    <input type="text" class="form-control" name="titulo" value="{{ $game->titulo }}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" value="{{ $game->precio }}">
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>

        </div>
    </div>
@endsection
