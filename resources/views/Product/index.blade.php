@extends('app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Laravel 8 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success mx-4" href="{{ route('Product.create') }}"> Create New Product</a>

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif



    <table class=" row col-md-12 table table-bordered   mx-3 mt-2  ">

        <tr class="bg-white rounded">

            <th>No</th>

            <th>Image</th>

            <th>Name</th>

            <th>Details</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)

        <tr class="bg-white">

            <td>{{ ++$i }}</td>

            <td><img src="/image/{{ $product->image }}" width="100px"></td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->detail }}</td>

            <td>

                <form action="{{ route('Product.destroy',['Product'=>$product->id]) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <a class="btn btn-info" href="{{ route('Product.show',['Product'=>$product->id]) }}">Show</a>



                    <a class="btn btn-primary" href="{{ route('Product.edit',['Product'=>$product->id]) }}">Edit</a>


                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $products->links() !!}



@endsection
