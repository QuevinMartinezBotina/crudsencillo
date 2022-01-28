@extends('app')


@section('content')

    <div class="row d-flex justify-content-center my-4">

        <div class="col-md-10 col-10 margin-tb">

            <div class="pull-right">

                <a class="btn btn-success mx-4" href="{{ route('Product.create') }}"> Create New Product</a>

            </div>

            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
        </div>

        <div class="col-md-10 col-10 d-flex justify-content-center">
            <table class="table shadow p-3  my-3  table-hover border ">
                <thead class="p-3 ">
                    <tr class="">
                        <th class="p-3 ">No</th>
                        <th class="p-3 ">Image</th>
                        <th class="p-3 ">Name</th>
                        <th class="p-3 ">Details</th>
                        <th class="p-3 " width="280px">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($products as $product)

                        <tr class="bg-white rounded">

                            <td class="text-center">{{ ++$i }}</td>

                            <td><img src="/image/{{ $product->image }}" width="100px"></td>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->detail }}</td>

                            <td>

                                <form action="{{ route('Product.destroy', ['Product' => $product->id]) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-info"
                                        href="{{ route('Product.show', ['Product' => $product->id]) }}">Show</a>



                                    <a class="btn btn-primary"
                                        href="{{ route('Product.edit', ['Product' => $product->id]) }}">Edit</a>


                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>

                            </td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection
