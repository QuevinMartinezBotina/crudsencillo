@extends('app')

@section('content')

    <div class="row">
        @foreach ($products as $product)

            <div class=" rounded col-md-3 d-flex justify-content-center my-4 ">
                <div class="card shadow text-center " style="width: 18rem;">
                    <img class=" mx-auto d-block w-75" src="/image/{{ $product->image }}" alt="...">
                    <div class="  card-body bg-dark text-white">
                        <h5 class="card-title"> <strong> {{ $product->name }} </strong></h5>
                        <hr>
                        <p class="card-text">{{ $product->detail }}</p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
