@extends('admin.home')

@section('title', 'Product List Page')
@section('content')
    <div class="main-content">

        @if (session('createSuccess'))
            <div class="col-5 offset-7">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('createSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="text-right mr-3">
            <a href="{{ route('admin#productCreatePage') }}">
                <button class="btn btn-dark">Create Product</button>
            </a>
        </div>

        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>

                    @if (count($productList) != 0)
                        <th></th>

                        <th>Owner Name</th>
                        <th>Product Cover Image</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Title</th>

                        <th></th>
                    @else
                        <h2 class="text-danger text-center mt-5 p-5">There is no product!!!</h2>
                    @endif


                </thead>

                <tbody>

                    @foreach ($productList as $item)
                        <tr class="tr-shadow">
                            <td></td>
                            <td class="  ">{{ $item['name'] }}</td>
                            <td class=" ">
                                <img src="{{ asset('storage/' . $item['image']) }}" class="rounded shadow"
                                    style="width:300px; height:200px;">
                            </td>
                            <td class="">{{ $item['phone'] }}</td>
                            <td class="">{{ $item['address'] }}</td>
                            <td class="">{{ $item['price'] }}</td>
                            <td class="">{{ $item['title'] }}</td>

                            <td class=" col-2 ">
                                <div class="table-data-feature">

                                    <a href="{{ route('admin#viewDetail', $item['id']) }}">
                                        <button class="item mr-2" data-toggle="tooltip" data-placement="top"
                                            title="View Details">
                                            <i class="fa-solid fa-eye "></i>
                                        </button>
                                    </a>

                                    <a href="{{ route('admin#updatePage', $item['id']) }}">
                                        <button class="item mr-2" data-toggle="tooltip" data-placement="top" title="Update">
                                            <i class="fa-solid fa-pen "></i>
                                        </button>
                                    </a>

                                    <a href="{{ route('admin#deleteProduct', $item['id']) }}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach


                </tbody>


            </table>
            {{ $productList->links() }}
        </div>
    </div>
@endsection
