@extends('app')

@section('content')
    <div class="row">
        @foreach ($games as $game)
            <div class="col-md-3 d-flex justify-content-center my-4 ">
                <div class="card text-center text-dark" style="width: 18rem;">
                    <div class="card-body shadow rounded">
                        <a href="{{ route('Game.show', ['Game' => $game->id]) }}">
                            <h5 class="card-title h2">{{ $game->titulo }}</h5>
                        </a>
                        <hr class="">
                        <p class="card-text">EL precio de <strong>{{ $game->titulo }}</strong> es de
                            <strong>${{ number_format($game->precio, 2, ',', '.') }}</strong> pesos cop 🇨🇴
                        </p>

                        {{-- Boton que abre ventana modal --}}
                        <button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $game->id }}">Eliminar</button>


                        <!-- MODAL -->
                        <div class="modal fade" id="modal-{{ $game->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Esta seguro de eliminar <strong>{{ $game->titulo }}</strong> de la lista de
                                        juegos?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,
                                            cancelar</button>

                                        <form action="{{ route('Game.destroy', ['Game' => $game->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
